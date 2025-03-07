<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catastro extends Model
{
    use HasFactory;

    
    protected $table = 'catastro_datos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'cve_catastro',
        'municipio',
        'localidad',
        'latitud',
        'longitud',
        'propietario',
        'folio',
        'titular',
        'curp',
        'rfc',
        'tipo_persona',
        'tipo_adjudicacion',
        'domicilio',
        'fecha_creacion'
    ];
}
