<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libros;

class LibroController extends Controller
{
    public function getLibros($id_oficina) 
    {
        $libros = Libros:: getLibrosOficina( $id_oficina );

        return response()->json($libros);
    }

    public function getLibrosST($seccion, $tomo, $id_oficina)
    {
        $libros = Libros::getLibrosTS($seccion, $tomo, $id_oficina);

        return response()->json($libros);
    }

    public function getImagenesLibros($id_oficina, $id_libro)
    {
        $imagenes = Libros::getImg($id_oficina, $id_libro);

        return response()->json($imagenes);
    }

    public function getInscripciones($seccion, $tomo, $id_oficina, $inscripcion)
    {
        $inscripciones = Libros::getInscripciones($seccion, $tomo, $inscripcion, $id_oficina);

        return response()->json($inscripciones);
    }
}
