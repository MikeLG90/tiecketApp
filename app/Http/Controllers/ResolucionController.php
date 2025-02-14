<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resolucion;
use App\Models\ResolucionFile;
use App\Models\Oficina;
use App\Models\Comentario;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ResolucionController extends Controller
{
    public function index() 
    {
        setlocale(LC_TIME, 'es_ES.UTF-8');
        Carbon::setLocale('es');

        $oficinas = Oficina::all();

        $resoluciones = Resolucion::indexResoluciones();

        foreach($resoluciones as $resolucion)
        {
            $resolucion->fecha_aper = Carbon::parse($resolucion->fecha_aper)->translatedFormat('j \d\e F \d\e Y');
        }

        $array = 0;
        foreach($resoluciones as $r){
           if($r->estatus == 0) {
           $array++;
           }
        }
        $cantidad_pendientes = $array;
        $array2 = 0;
        foreach($resoluciones as $r){
           if($r->estatus == 1) {
           $array2++;
           }
        }

        $cantidad_aprobadas = $array2;

        $total = $cantidad_aprobadas + $cantidad_pendientes;

        return view('rppc.resoluciones.resolucion_index', data: compact('oficinas', 'resoluciones', 'cantidad_pendientes', 'cantidad_aprobadas', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'attachments.*' => 'file|mimes:jpg,jpeg,png,pdf|max:2048', // Ajusta según tus necesidades
        ]);
   
        $resolucion = new Resolucion();

        $resolucion->usuario_id = auth()->user()->usuario_id;
        $resolucion->titulo = $request->titulo;
        $resolucion->fecha_aper = $request->fecha_apertura;
        $resolucion->tipo = $request->tipo;
        $resolucion->estado = $request->estado;
        $resolucion->urgencia = $request->urgencia;
        $resolucion->impacto = $request->impacto;
        $resolucion->prioridad = $request->prioridad;
        $resolucion->oficina_dest = $request->oficina;
        $resolucion->estatus = 0;
        $resolucion->descripcion = $request->descripcion;
        $resolucion->save();

        // Carga del anexo de la resolución
        if($request->hasFile('attachments')) {
            foreach($request->file('attachments') as $file) {
                //Obtener nombre del archivo
                $originalName = $file->getClientOriginalName();
                $uniqueName = "RS-" . $resolucion->titulo . '-' . pathinfo($originalName, PATHINFO_FILENAME) . '-' . time() . '.' . $file->getClientOriginalExtension();
                //Guardado del archivo en el servidor QNAP 10.9.35.30 por FTP
                $path = $file->storeAs('archivos', $uniqueName, 'ftp');

                // Crear un nuevo registro en la tabla ResolucionFiLe
                ResolucionFile::create([
                    'resolucion_id' => $resolucion->resolucion_id,
                    'file_path' => $path,
                ]);
            }
        }

        return redirect("/resoluciones")->with('success', 'Resolución emitida correctamente');
    }

    public function update()
    {

    }
    public function view($resolucion_id)
    {
        setlocale(LC_TIME, 'es_ES.UTF-8');
        Carbon::setLocale('es');

        $resolucion = Resolucion::resolucion($resolucion_id);
        $resolucion[0]->fecha_aper = Carbon::parse($resolucion[0]->fecha_aper)->translatedFormat('j \d\e F \d\e Y');
        
        $comentarios = Comentario::comentariosR($resolucion_id);
        
        $oficina = null;

        $oficina  = Oficina::findOrFail($resolucion[0]->oficina_dest);

        $oficina_nombre = $oficina->oficina;

        
        return view('rppc.resoluciones.preview-res', data: compact('resolucion', 'comentarios', 'oficina_nombre'));
    }

    public function getResolucionesData()
    {
        $resoluciones = Resolucion::resolucionData();

            // Array con la traducción de los días
        $daysInSpanish = [
            'Monday' => 'Lunes',
            'Tuesday' => 'Martes',
            'Wednesday' => 'Miércoles',
            'Thursday' => 'Jueves',
            'Friday' => 'Viernes',
            'Saturday' => 'Sábado',
            'Sunday' => 'Domingo'
        ];


        $daysOfWeek = collect([
            'Lunes' => 0, 'Martes' => 0, 'Miércoles' => 0, 'Jueves' => 0,
            'Viernes' => 0, 'Sabado' => 0, 'Domingo' => 0
        ]);

        foreach ($resoluciones as $resolucion) {
            $dayName = Carbon::parse($resolucion->fecha)->format('l'); //Obtiene el nombre del día
            $dayInSpanish = $daysInSpanish[$dayName];
            $daysOfWeek[$dayInSpanish] = $resolucion->total;
        }

        return response()->json([
            'labels' => $daysOfWeek->keys(),
            'data' => $daysOfWeek->values()
        ]);
    }

    public function resolucionFile($id)
    {
     
        $resolucion = Resolucion::resolucion();

        $file = DB::table('resolucion_file as r')
            ->join('resoluciones as r1', 'r.resolucion_id', '=', 'r1.resolucion_id')
            ->select('r.*')
            ->where('r.resolucion_id', '=', $id)
            ->get();
        
        return response()->json([
            'resolucion' => $resolucion,
            'files' => $file
        ]);
                
    }

    public function cambiarEstado($resolucion_id)
    {
        $resolucion = Resolucion::findOrFail($resolucion_id);

        $resolucion->estatus = 1;
        $resolucion->save();
        

        return redirect()->back();
    }
}
