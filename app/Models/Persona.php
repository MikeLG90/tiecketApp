<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'persona';
    protected $primaryKey = 'persona_id';

    protected $fillable = [
        'nombre',
        'ape_materno',
        'ape_paterno',
        'telefono',
        'sexo'
    ];

    public function user ()
    {
        return $this->belongsTo(User::class);
    }

}
