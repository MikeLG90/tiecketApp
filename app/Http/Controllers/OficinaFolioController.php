<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OficinaFolio;

class OficinaFolioController extends Controller
{
    public function index()
    {
        $oficinas = OficinaFolio::all();

        return view('rppc.oficinafolio.oficinafolio_index', compact('oficinas'));
    }

    public function store(Request $request)
    {
        $oficina = new OficinaFolio;
        $oficina->oficina = $request->nombre;
        $oficina->descripcion = $request->descripcion;
        $oficina->save();

        return redirect('/oficinas-folios')->with('success', 'Nueva oficina aregada');
    }

    public function update(Request $request, $id)
    {

        $oficina = OficinaFolio::find($id);
        $oficina->oficina = $request->nombreEdit;
        $oficina->descripcion = $request->descripcionEdit;
        $oficina->save();

        return redirect('/oficinas-folios')->with('success', 'Oficina modificada exitosamente');
    }

    public function destroy($oficina_folio_id)
    {
        // Buscar área 
        $oficina = OficinaFolio::find($oficina_folio_id);
        
        // Verifica si la oficina existe
        if (!$oficina) {
            return redirect()->back()->with('error', 'Área no encontrada.');
        }

        // Elimina la oficina
        $oficina->delete();

        // Redirige con un mensaje de éxito
        return redirect()->back()->with('success', 'Oficina eliminada exitosamente.');
    }


}
