<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Notificacion extends Model
{
    use HasFactory;

    protected $table = 'notificaciones';
    protected $primaryKey = 'not_id';

    protected $fillable = [
        'oficina',
        'remitente_id',
        'destinatario_id',
        'mensaje', 
        'estatus'
 ];

    public static function misNot() {
        $notificaciones = DB::table('notificaciones as n')
    ->join('usuarios as u', 'n.destinatario_id', '=', 'u.usuario_id')
    ->join('persona as p', 'p.usuario_id', '=', 'u.usuario_id')
    ->select(
        'n.destinatario_id',
        'n.mensaje',
        'n.not_id',
        'n.estatus',
        DB::raw('CONCAT(p.nombre, " ", p.ape_paterno) AS rem'),
        'u.image'
    )
    ->where('n.destinatario_id', '=', auth()->user()->usuario_id)
    ->get();

    return $notificaciones;

    }    

    public static function conteo() {
        $notificacionesCount = DB::table('notificaciones as n')
    ->join('usuarios as u', 'n.destinatario_id', '=', 'u.usuario_id')
    ->join('persona as p', 'p.usuario_id', '=', 'u.usuario_id')
    ->where('n.destinatario_id', '=', auth()->user()->usuario_id)
    ->where('n.estatus', 1)
    ->count();

    return $notificacionesCount;
    }
}
