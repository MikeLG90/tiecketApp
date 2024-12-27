<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Grupo extends Model
{
    use HasFactory;
    protected $table = 'grupos';
    protected $primaryKey = 'group_id';

    protected $fillable = [
        'nombre',
        'miembros',
        'descripcion'
    ];

    public static function getLibrosOficina($id_libro)
    {
        $query = DB::connection('visor_db')->table('tomos1')
                ->select('tomos1.*')
                ->where('id_libro', $id_libro);
            
                return $query->get();
    }

}
