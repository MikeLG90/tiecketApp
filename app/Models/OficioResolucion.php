<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OficioResolucion extends Model
{
    use HasFactory;
    protected $table = 'oficio_res';
    protected $primaryKey = 'oficio_res_id	';

    protected $fillable = ['resolucion_id', 'file_path'];
}
