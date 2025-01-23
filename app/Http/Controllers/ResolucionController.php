<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resolucion;
use App\Models\Oficina;
use Illuminate\Support\Facades\DB;


class ResolucionController extends Controller
{
    public function index() 
    {
        $oficinas = Oficina::all();

        return view('rppc.resoluciones.resolucion_index', compact('oficinas'));
    }
}
