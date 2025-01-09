<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OficinaFolio extends Model
{
    use HasFactory;

    protected $table = "oficina_folios";
    protected $primaryKey = "oficina_folio_id";

    protected $fillable = [
        'oficina',
        'descripcion'
    ];
}
