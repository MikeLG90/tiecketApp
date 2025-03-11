<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catastro;


class CatastroApiController extends Controller
{

    public function index() {
        $catastros = Catastro::all();

        return view('rppc.web_services.ig_api', compact('catastros'));
    }
    public function obtenerDatosRppc($cve_catastro) 
    {
        $url = 'http://sistemas-rppc.qroo.gob.mx:4000/catastro';
        
        $token = 'wbp7GUZsW0aBL5KWMqTfuk7KpcPKmc3CYSi2jtg1qg7ce9QO6LPoWyCBAYkcCSmW';

        $data = [
            'username' => 'DarthMike',
            'password' => 'orionpax',
            'cve_c' => $cve_catastro
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $token,
            'Content-Type: application/json'            
        ]);

        // Rspuesta de la api RPPC

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);

    }
    public function store(Request $request)
    {

        try {

            $cve_catastro = $request->cve_catastro;
            $municipio = $request->municipio;
            $localidad = $request->localidad !== 'Sin registros encontrados' ? $request->localidad : null;
            $latitud = is_numeric($request->latitud) ? $request->latitud : null;
            $longitud = is_numeric($request->longitud) ? $request->longitud : null;
            $folio = $request->folio;
            $propietario = $request->titular !== 'Sin registros encontrados' ? $request->titular : null;
            $titular = $request->titular !== 'Sin registros encontrados' ? $request->titular : null;
            $curp = $request->curp !== 'Sin registros encontrados' ? $request->curp : null;
            $rfc = $request->rfc !== 'Sin registros encontrados' ? $request->rfc : null;
            $tipo_persona = $request->persona !== 'Sin registros encontrados' ? $request->persona : null;
            $tipo_adjudicacion = $request->adj !== 'Sin registros encontrados' ? $request->adj : null;
            $domicilio = $request->domi !== 'Sin registros encontrados' ? $request->domi : null;
    
            $catastroDatos = Catastro::create([
                'fuente' => "API",
                'cve_catastro' => $cve_catastro,
                'municipio' => $municipio,
                'localidad' => $localidad,
                'latitud' => $latitud,
                'longitud' => $longitud,
                'folio' => $folio,
                'propietario' => $propietario,
                'titular' => $titular,
                'curp' => $curp,
                'rfc' => $rfc,
                'tipo_persona' => $tipo_persona,
                'tipo_adjudicacion' => $tipo_adjudicacion,
                'domicilio' => $domicilio,
            ]);
    
            return response()->json([
                'success' => true,
                'message' => 'Datos guardados correctamente',
                'data' => $catastroDatos
            ], 201);
    
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error al guardar los datos: ' . $e->getMessage(),
            ], 500);
        }
    }
}
