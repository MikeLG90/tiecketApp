<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use App\Events\ComentarioPublicado;


class ComentarioController extends Controller
{
    public function store(Request $request)
    {

        $comentario = new Comentario;

        $comentario->resolucion_id = $request->resolucion_id;
        $comentario->usuario_id = auth()->user()->usuario_id;
        $comentario->contenido = $request->contenido;

        $comentario->save();
        
        return redirect()->back();
    }
    
}
