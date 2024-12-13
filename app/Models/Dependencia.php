<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    use HasFactory;

    protected $table = 'dependencia';
    protected $primaryKey = 'dep_id';

    protected $fillable = [
           'nombre',
           'descripcion',
           'cs_id'
    ];
}
