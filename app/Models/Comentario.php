<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class Comentario extends Model
{
    use HasFactory;
    protected $table = 'comentarios';
    protected $primaryKey = 'comentario_id';

    protected $fillable = [
           'resolucion_id',
           'usuario_id',
           'comentario'
    ];

    public static function comentariosR($resolucion_id = null)
    {
        setlocale(LC_TIME, 'es_ES.UTF-8');
        Carbon::setLocale('es');

    $comentarios = DB::table('comentarios as c')
    ->join('resoluciones as r', 'c.resolucion_id', '=', 'r.resolucion_id')
    ->join('usuarios as u', 'u.usuario_id', '=', 'c.usuario_id')
    ->join('persona as p', 'p.usuario_id', '=', 'u.usuario_id')
    ->where('r.resolucion_id', $resolucion_id)
    ->selectRaw('CONCAT(p.nombre, " ", p.ape_paterno, " ", p.ape_materno) as usuario, c.contenido, u.image, c.created_at')
    ->get();

    foreach ($comentarios as $comentario) {
        $comentario->created_at = Carbon::parse($comentario->created_at)->translatedFormat('j \d\e F \d\e Y');
    }

    return $comentarios;

    }
}
