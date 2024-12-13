<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'grupos';
    protected $primaryKey = 'group_id';

    protected $fillable = [
        'nombre',
        'miembros',
        'descripcion'
    ];

    use HasFactory;
}
