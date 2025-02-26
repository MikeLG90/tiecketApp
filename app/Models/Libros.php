<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Libros extends Model
{
    use HasFactory;

    protected $connection = 'visor_db'; // Conexión específica
    protected $table = 'tomos1';
    protected $primaryKey = 'id_libro';

    protected $fillable = [
        'id_oficina',
        'seccion',
        'tomo',
        'volumen',
        'foja_inicial',
        'foja_final',
        'no_inscripciones',
        'status',
        'observaciones'
    ];

    public static function getLibrosOficina($id_oficina)
    {
        $query = DB::connection('visor_db')->table('tomos1')
            ->select('tomos1.*')
            ->where('id_oficina','=', $id_oficina);
            
            return $query->get();
    }

    public static function getLibrosTS($seccion, $tomo, $id_oficina)
    {
        $query = DB::connection('visor_db')->table('tomos1')
            ->select('tomos1.*')
            ->where('id_oficina', '=', $id_oficina)
            ->where('seccion', 'like', '%' . $seccion . '%')
            ->where('tomo', 'like', $tomo . '%');

            return $query->get();
    }

    public static function getImg($id_oficina, $id_libro)
    {
        $query = DB::connection('visor_db')->table('libroimagen')
        ->select('libroimagen.*')
        ->where('id_oficina','=', $id_oficina)
        ->where('id_libro','=', $id_libro);

        return $query->get();
    }

    public static function getInscripciones($seccion, $tomo, $inscripcion, $id_oficina)
    {
        $query = DB::connection('visor_db')->table('inscripciones')
            ->select('inscripciones.*')
            ->where('id_oficina', '=', $id_oficina)
            ->where('seccion', '=', $seccion)
            ->where('tomo', 'like', $tomo . '%')
            ->where('ins_inicial', '=', $inscripcion);

            return $query->get();
    }

}