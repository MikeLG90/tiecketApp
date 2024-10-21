<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'tickets';
    protected $primaryKey = 'ticket_id';

    protected $fillable = [
        'usuario_id',
        'titulo',
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

}
