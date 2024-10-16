<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Area;
use Carbon\Carbon;

class AreaController extends Controller
{

    public function index()

    {
        $areas = Area::all();

        return view('rppc.areas.areas-index', compact('areas'));
    }

    public function store(Request $request)
    {
        $area = new Area;

        $area->area = $request->nombre;
        $area->created_at = now();
        $area->updated_at = now();
        $area->save();

        return redirect('/areas')->with('success', 'Nueva área aregada');

    }

    public function update(Request $request, $id)
    {

        $area = Area::find($id);
        $area->area = $request->nombreedit;
        $area->save();

        return redirect('/areas')->with('success', 'Área actualizada exitosamente');

    }
    
    public function destroy($area_id)
    {
        // Busca el área por su ID
        $area = Area::find($area_id);

        // Verifica si el área existe
        if (!$area) {
            return redirect()->back()->with('error', 'Área no encontrada.');
        }

        // Elimina el área
        $area->delete();

        // Redirige con un mensaje de éxito
        return redirect()->back()->with('success', 'Área eliminada exitosamente.');
    }
}
