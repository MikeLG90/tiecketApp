<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delegacion;
use App\Models\Dependencia;
use Illuminate\Support\Facades\DB;

class DelegacioneController extends Controller
{
    public function index()
    {
        $dependencias = Dependencia::all();

        $delegaciones = DB::table('oficinas as o')
            ->join('dependencia as d', 'o.dep_id', '=', 'd.dep_id')
            ->select('o.oficina_id', 'o.oficina', 'd.nombre as dependencia')
            ->get();

        return view('rppc.delegaciones.delegaciones-index', compact('delegaciones', 'dependencias'));
    }

    public function store(Request $request)
    {
        $delegacion = new Delegacion;

        $delegacion->oficina = $request->nombre;
        $delegacion->dep_id = $request->dependencia;
        $delegacion->save();

        return redirect('/delegaciones')->with('success', 'Nueva delegación aregada');
    }

    public function update(Request $request, $id)
    {

        $delegacion = Delegacion::find($id);
        $delegacion->oficina = $request->nombreedit;
        $delegacion->save();

        return redirect('/delegaciones')->with('success', 'Delegacion actualizada exitosamente');

    }

    public function destroy($oficina_id)
    {
        // Busca el área por su ID
        $delegacion = Delegacion::find($oficina_id);

        // Verifica si el área existe
        if (!$delegacion) {
            return redirect()->back()->with('error', 'Delegación no encontrada.');
        }

        // Elimina el área
        $delegacion->delete();

        // Redirige con un mensaje de éxito
        return redirect()->back()->with('success', 'Delegación eliminada exitosamente.');
    }

}
