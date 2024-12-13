<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dependencia;

class DependenciaController extends Controller
{
    public function index()
    {
        $dependencias = Dependencia::all();

        return view('rppc.dependencias.dep-index', compact('dependencias'));
    }

    public function store(Request $request)
    {
        $dependencia = new Dependencia;

        $dependencia->nombre = $request->nombre;
        $dependencia->descripcion = $request->descripcion;
        $dependencia->save();
        
        return redirect('/dependencias')->with('success', 'Nueva dependencia agregada');
        
    }

    public function update(Request $request, $id)
    {
        $dependencia = Dependencia::find($id);
        $dependencia->nombre = $request->nombreedit;
        $dependencia->descripcion = $request->descripcionedit;
        $dependencia->save();
        
        return redirect('/dependencias')->with('success', 'Dependencia actualizada exitosamente');        

    }

    public function destroy($dep_id)
    {
        // Busca la dependencia por su ID
        $dependencia = Dependencia::find($dep_id);

        // Verifica si la dependencia existe
        if (!$dependencia) {
                return redirect()->back()->with('error', 'Dependencia no encontrada.');
        }

        // Elimina la dependencia
        $dependencia->delete();

        // Redirige con un mensaje de éxito
        return redirect()->back()->with('success', 'Dependencia eliminada exitosamente.');
    }

}
