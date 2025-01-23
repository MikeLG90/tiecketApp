<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Resolucion extends Model
{
    
    protected $table = 'resoluciones';
    protected $primaryKey = 'resolucion_id';
    use HasFactory;

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
