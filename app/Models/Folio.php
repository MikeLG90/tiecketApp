<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Folio extends Model
{
    use HasFactory;

    protected $table = 'folios';
    protected $primaryKey = 'folio_id';

    protected $fillable = [
        'num_folio',
        'usuario_id',
        'fecha y hora',
        'destinatario',
        'oficina',
        'folio_generado'
    ];

    public static function obtenerFolios() {
        setlocale(LC_TIME, 'es_ES.UTF-8');
        Carbon::setLocale('es');
        
        $folios = DB::table('folios as f')
            ->join('usuarios as u', 'f.usuario_id', '=', 'u.usuario_id')
            ->join('persona as p', 'u.usuario_id', '=', 'p.usuario_id')
            ->join('areas as a', 'a.area_id', '=', 'u.area_id')
            ->select(
                'f.num_folio',
                'f.folio_generado',
                'f.destinatario',
                'f.oficina',
                'f.fecha_hora',
                DB::raw('p.nombre || \' \' || p.ape_materno || \' \' || p.ape_paterno AS generado_por'),
                'a.area'
            )
            ->get();
    
        foreach ($folios as $folio) {
            $folio->fecha_hora = Carbon::parse($folio->fecha_hora)->translatedFormat('j \d\e F \d\e Y');
        }
    
        return $folios;
    }
    
    public static function misFolios() {
        setlocale(LC_TIME, 'es_ES.UTF-8');
        Carbon::setLocale('es');
    
        $folios = DB::table('folios as f')
            ->join('usuarios as u', 'f.usuario_id', '=', 'u.usuario_id')
            ->join('persona as p', 'u.usuario_id', '=', 'p.usuario_id')
            ->join('areas as a', 'a.area_id', '=', 'u.area_id')
            ->select(
                'f.num_folio',
                'f.destinatario',
                'f.oficina',
                'f.fecha_hora',
                DB::raw('p.nombre || \' \' || p.ape_materno || \' \' || p.ape_paterno AS generado_por'),
                'a.area'
            )
            ->where('f.usuario_id', '=', auth()->user()->usuario_id)
            ->get();
    
        foreach ($folios as $folio) {
            $folio->fecha_hora = Carbon::parse($folio->fecha_hora)->translatedFormat('j \d\e F \d\e Y');
        }
    
        return $folios;
    }
    
}
