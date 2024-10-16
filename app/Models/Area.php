<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $table = 'Areas';
    protected $primaryKey = 'area_id';

    protected $fillable = [
        'area'
    ];
}
