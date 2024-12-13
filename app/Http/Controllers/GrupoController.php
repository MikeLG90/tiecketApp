<?php

namespace App\Http\Controllers;
use App\Models\Grupo;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class GrupoController extends Controller
{
    public function index() {
        $grupos = Grupo::all();

        $users = DB::table('usuarios as u')
        ->join('persona as p','p.usuario_id','=','u.usuario_id')
        ->join('oficinas as o', 'o.oficina_id', '=','u.oficina_id')
        ->join('areas as a', 'a.area_id', '=', 'u.area_id')
        ->select(
            'u.*',
            'a.area',
            DB::raw('CONCAT(p.nombre, " ", p.ape_paterno, " ", p.ape_materno, " (", a.area, ", ", o.oficina, ")") as nombre_completo')
        )
        ->get();



    return view("rppc.grupos.grupo-index", compact("grupos", "users"));

    }

    public function store(Request $request) {

        $grupo = new Grupo();

        $grupo->nombre = $request->nombre;
        $grupo->miembros = $request->miembros_ids;
        $grupo->descripcion = $request->descripcion;
        $grupo->save();

    return redirect("/grupos")->with("success","Grupo Creado Exitosamente");

    }

    public function getMembers($group_id) {

        $grupo = Grupo::find($group_id);

        if (!$grupo) {
            return response()->json([
                "error" => "Grupo no encontrado"
            ], 404);
        }

        $array = "$grupo->miembros";
        $array = explode(' | ', $array);

        $pila = array();

        foreach($array as $a) {
           $user =  User::with('persona')->where('usuario_id', $a)->first();
           array_push($pila, $user->persona->nombre . " " . $user->persona->ape_paterno . " " . $user->persona->ape_materno);
        }
    
        return response()->json([
            "miembros"=> $pila,
            "grupo" => $grupo
        ]);
    }
}
