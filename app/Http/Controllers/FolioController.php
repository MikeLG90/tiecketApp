<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Folio;
use Carbon\Carbon;

class FolioController extends Controller
{
    public function create ()
    {
        $user = auth()->user();

        return view('rppc.folios.folio_form', compact('user'));
    }

    public function store (Request $request)
    {
        $folio = new Folio;
        $ultimoFolio = Folio::latest()->first();
        $num_folio = null;

        if($ultimoFolio) {

        if($ultimoFolio->num_folio == 0) {
            $num_folio = 1;
        }else {
            $num_folio = $ultimoFolio->num_folio + 1; 
        }

    }else {
        $num_folio =1;
    }

        $folio->num_folio = $num_folio;
        $folio->usuario_id = Auth()->user()->usuario_id;
        $folio->fecha_hora = $request->fecha;
        $folio->destinatario = $request->para;
        $folio->oficina = $request->oficina;
        $folio->save();

        return redirect()->route('folios.show', ['folio' => $folio->folio_id]);

    }

    public function show(Folio $folio)
    {
        setlocale(LC_TIME, 'es_ES.UTF-8');
        Carbon::setLocale('es');
        $user = auth()->user();


        $fecha = $folio->fecha_hora;
        
        // traducir a lenguaje humano la fecha
        $fecha = Carbon::parse($folio->fecha_hora)->translatedFormat('j \d\e F \d\e Y');
        return view('rppc.folios.folio_generado', compact('folio', 'fecha', 'user'));
    }

    public function index () 
    {
        $folios = Folio::obtenerFolios();

       // dd($folios);

        return view('rppc.folios.dash_folios', compact('folios'));
    }

    public function misFolios () 
    {
        $folios = Folio::misFolios();

       // dd($folios);

        return view('rppc.folios.mis_folios', compact('folios'));
    }
}
