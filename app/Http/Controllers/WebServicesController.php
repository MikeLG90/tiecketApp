<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WebServicesController extends Controller
{
    public function obtenerDatosCatastro($municipio, $cve) 
    {
        $url = 'http://catastro.sefiplan.qroo.gob.mx/api_rest/9eb4dffa33c4bdbe074945814cee6995/' . $municipio . '/cve_cata/' . $cve;

                // Realiza la solicitud a la API
                $respuesta = Http::get($url);

                // Verifica si la solicitud fue exitosa
                if ($respuesta->successful()) {
                    return response()->json($respuesta->json(), 200);
                } else {
                    return response()->json(['error' => 'No se pudo obtener los datos.'], $respuesta->status());
                }
            }
}
