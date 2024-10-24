<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'tickets';
    protected $primaryKey = 'ticket_id';

    protected $fillable = [
        'usuario_id',
        'titulo',
        'nu_ticket',
        'fecha_aper',
        'tipo',
        'categoria',
        'estado',
        'urgencia',
        'impacto',
        'prioridad',
        'descripcion',
        'file_path',
        'estatus'
    ];

    public static function myTicks()
    {
        $tickets = DB::table('tickets as t')
            ->join('usuarios as u', 't.usuario_id', '=', 'u.usuario_id')
            ->join('persona as p', 'u.usuario_id', '=', 'p.usuario_id')
            ->select('t.*',                
            DB::raw('CONCAT(p.nombre, " ", p.ape_materno, " ", p.ape_paterno) AS remitente'),
            )
            ->where('u.usuario_id', '=', auth()->user()->usuario_id)
            ->get();

            return $tickets;
    }

    public static function files($ticket_id = null)
    {
        $files = DB::table('ticket_file')
            ->select('*')
            ->where('usuario_id', '=', auth()->user()->usuario_id)
            ->get();

            return $files;
    }


}
