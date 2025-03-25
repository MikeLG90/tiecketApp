<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resolucion;
use App\Models\ResolucionFile;
use App\Models\SolicitudResolucion;
use App\Models\OficioResolucion;
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

    public function index1(Request $request)
    {
        try {
            // Construir la consulta base
            $resultados = DB::table('rppc.resoluciones as r')
                ->join('rppc.usuarios as u', 'r.usuario_id', '=', 'u.usuario_id')
                ->join('rppc.persona as p', 'p.usuario_id', '=', 'u.usuario_id')
                ->join('rppc.oficinas as o', 'o.oficina_id', '=', DB::raw('r.oficina_dest::integer'))
                ->select(
                    'r.*',
                    'o.oficina',
                    DB::raw("p.nombre || ' ' || p.ape_paterno || ' ' || p.ape_materno AS nombre_completo")
                );
    
            // Aplicar filtros
            if ($request->has('oficina_id') && $request->oficina_id !== 'Todos') {
                $resultados->where('r.oficina_dest', $request->oficina_id);
            }
    
            if ($request->has('tipo') && $request->tipo !== 'Todos') {
                $resultados->where('r.tipo', $request->tipo);
            }
    
            if ($request->has('estatus') && $request->estatus !== 'Todos') {
                $resultados->where('r.estatus', $request->estatus);
            }
            if ($request->has('usuario_id') && $request->usuario_id == auth()->user()->usuario_id )
                $resultados->where('r.usuario_id', auth()->user()->usuario_id);
            
            $perPage = $request->input('per_page', 10);
    
            // Obtener los resultados
            $resoluciones = $resultados->paginate($perPage);
    
            return response()->json($resoluciones);
    
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Ocurrió un error en la API.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    

    public function index2(Request $request)
    {
        try {
            // Construir la consulta base
            $resultados = DB::table('rppc.resoluciones as r')
                ->join('rppc.usuarios as u', 'r.usuario_id', '=', 'u.usuario_id')
                ->join('rppc.persona as p', 'p.usuario_id', '=', 'u.usuario_id')
                ->join('rppc.oficinas as o', 'o.oficina_id', '=', DB::raw('r.oficina_dest::integer'))
                ->select(
                    'r.*',
                    'o.oficina',
                    DB::raw("p.nombre || ' ' || p.ape_paterno || ' ' || p.ape_materno AS nombre_completo")
                )
                ->where('r.usuario_id', auth()->user()->usuario_id);
    
            // Aplicar filtros
            if ($request->has('oficina_id') && $request->oficina_id !== 'Todos') {
                $resultados->where('r.oficina_dest', $request->oficina_id);
            }
    
            if ($request->has('tipo') && $request->tipo !== 'Todos') {
                $resultados->where('r.tipo', $request->tipo);
            }
    
            if ($request->has('estatus') && $request->estatus !== 'Todos') {
                $resultados->where('r.estatus', $request->estatus);
            }
 
            $perPage = $request->input('per_page', 10);
    
            // Obtener los resultados
            $resoluciones = $resultados->paginate($perPage);
    
            return response()->json($resoluciones);
    
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Ocurrió un error en la API.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    
    public function index3(Request $request)
    {
        try {
            // Construir la consulta base
            $resultados = DB::table('rppc.resoluciones as r')
                ->join('rppc.usuarios as u', 'r.usuario_id', '=', 'u.usuario_id')
                ->join('rppc.persona as p', 'p.usuario_id', '=', 'u.usuario_id')
                ->join('rppc.oficinas as o', 'o.oficina_id', '=', DB::raw('r.oficina_dest::integer'))
                ->select(
                    'r.*',
                    'o.oficina',
                    DB::raw("p.nombre || ' ' || p.ape_paterno || ' ' || p.ape_materno AS nombre_completo")
                )
                ->where('r.estatus',1);
    
            // Aplicar filtros
            if ($request->has('oficina_id') && $request->oficina_id !== 'Todos') {
                $resultados->where('r.oficina_dest', $request->oficina_id);
            }
    
            if ($request->has('tipo') && $request->tipo !== 'Todos') {
                $resultados->where('r.tipo', $request->tipo);
            }
    
            if ($request->has('estatus') && $request->estatus !== 'Todos') {
                $resultados->where('r.estatus', $request->estatus);
            }
 
            $perPage = $request->input('per_page', 10);
    
            // Obtener los resultados
            $resoluciones = $resultados->paginate($perPage);
    
            return response()->json($resoluciones);
    
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Ocurrió un error en la API.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    
    public function index4(Request $request)
    {
        try {
            // Obtener la oficina del usuario autenticado
            $oficinaUsuario = auth()->user()->oficina_id;
    
            // Construir la consulta base
            $resultados = DB::table('rppc.resoluciones as r')
                ->join('rppc.usuarios as u', 'r.usuario_id', '=', 'u.usuario_id')
                ->join('rppc.persona as p', 'p.usuario_id', '=', 'u.usuario_id')
                ->join('rppc.oficinas as o', 'o.oficina_id', '=', DB::raw('r.oficina_dest::integer'))
                ->select(
                    'r.*',
                    'o.oficina',
                    DB::raw("p.nombre || ' ' || p.ape_paterno || ' ' || p.ape_materno AS nombre_completo")
                )
                ->where('r.estatus', 0)
                ->where('r.oficina_dest', $oficinaUsuario); // Filtrar por la oficina del usuario autenticado
    
            // Aplicar filtros opcionales
            if ($request->has('oficina_id') && $request->oficina_id !== 'Todos') {
                $resultados->where('r.oficina_dest', $request->oficina_id);
            }
    
            if ($request->has('tipo') && $request->tipo !== 'Todos') {
                $resultados->where('r.tipo', $request->tipo);
            }
    
            if ($request->has('estatus') && $request->estatus !== 'Todos') {
                $resultados->where('r.estatus', $request->estatus);
            }
    
            $perPage = $request->input('per_page', 10);
    
            // Obtener los resultados paginados
            $resoluciones = $resultados->paginate($perPage);
    
            return response()->json($resoluciones);
    
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Ocurrió un error en la API.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'attachments.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'attachments1.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'attachments2.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
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
        $resolucion->promovente = $request->promovente;
        $resolucion->save();

        // Carga la solicitud de la anexión
        if($request->hasFile('attachments1')) {
            foreach($request->file('attachments1') as $file) {
                //Obtener nombre del archivo
                $originalName = $file->getClientOriginalName();
                $uniqueName = "SOLICITUD_RS-" . $resolucion->titulo . '-' . pathinfo($originalName, PATHINFO_FILENAME) . '-' . time() . '.' . $file->getClientOriginalExtension();
                //Guardado del archivo en el servidor QNAP 10.9.35.30 por FTP
                $path = $file->storeAs('archivos', $uniqueName, 'ftp');

                // Crear un nuevo registro en la tabla ResolucionFiLe
                SolicitudResolucion::create([
                    'resolucion_id' => $resolucion->resolucion_id,
                    'file_path' => $path,
                ]);
            }
        }

        // Carga del oficio de la resolucion
        if($request->hasFile('attachments2')) {
            foreach($request->file('attachments2') as $file) {
                //Obtener nombre del archivo
                $originalName = $file->getClientOriginalName();
                $uniqueName = "OFICIO_RS-" . $resolucion->titulo . '-' . pathinfo($originalName, PATHINFO_FILENAME) . '-' . time() . '.' . $file->getClientOriginalExtension();
                //Guardado del archivo en el servidor QNAP 10.9.35.30 por FTP
                $path = $file->storeAs('archivos', $uniqueName, 'ftp');

                // Crear un nuevo registro en la tabla ResolucionFiLe
                OficioResolucion::create([
                    'resolucion_id' => $resolucion->resolucion_id,
                    'file_path' => $path,
                ]);
            }
        }

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

    public function resolucionFileSol($id)
    {
     
        $resolucion = Resolucion::resolucion();

        $file = DB::table('solicitud_res as r')
            ->join('resoluciones as r1', 'r.resolucion_id', '=', 'r1.resolucion_id')
            ->select('r.*')
            ->where('r.resolucion_id', '=', $id)
            ->get();
        
        return response()->json([
            'resolucion' => $resolucion,
            'files' => $file
        ]);
                
    }

    public function resolucionFileOficio($id)
    {
     
        $resolucion = Resolucion::resolucion();

        $file = DB::table('oficio_res as r')
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
        $user = DB::table('usuarios as u')
        ->join('persona as p', 'u.usuario_id', '=', 'p.usuario_id')
        ->select(
            DB::raw('p.nombre || \' \' || p.ape_paterno || \' \' || p.ape_materno AS user')
        )
        ->where('u.usuario_id', '=', auth()->user()->usuario_id)
        ->first();

        $resolucion = Resolucion::findOrFail($resolucion_id);

        switch (auth()->user()->rol_id) {
            case 6:
            case 1:
                $resolucion->estatus = 1;
                $resolucion->aprobacion = $user->user;
                break;
            case 8:
                $resolucion->estatus = 2;
                break;
            default:
                return redirect()->back()->with('error', 'No tienes permiso para cambiar el estado.');
        }
        $resolucion->save();
        

        return redirect()->back();
    }
}
