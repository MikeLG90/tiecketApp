<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SATQController extends Controller
{
    public function obtenerToken() {
        
        // Url de la api ConsulSATQ para token
        $url = 'http://148.235.173.216/rpp/Token';

        // Datos para hacer funcionar la api

        $data = [
            'grant_type' => 'password',
            'username'=> 'jonamorales002@gmail.com',
            'password'=> 'hb1$iBBQK'
        ];
 
        // Inicializar url

        $ch = curl_init($url);

        // Configura las opciones de cURL
 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(($data)));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/x-www-form-urlencoded', 
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);    

    }

    public function obtenerConceptosPagados($token, $referencia, $acto = "") {

        $url = "http://148.235.173.216/rpp/api/obtenerConceptosPagados";
        // Parametros para la api
        $data = [
            'referencia' => $referencia,
            'acto'=> $acto
        ];

        // Inicializar URL

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $token,
            'Content-Type: application/json'
        ]);

        // Respuesta API
        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);    
    }

    public function obtenerConceptoLog($conceptoId, $token) {
        // URL de la API
        $url = 'http://148.235.173.216/rpp/api/obtenerConceptosLog';
    
        // Preparar los datos para el cuerpo de la solicitud
        $data = [
            'conceptoId' => $conceptoId // Asegurarse de que sea un entero
        ];
    
        // Inicializar cURL
        $ch = curl_init();
    
        // Configurar cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Retornar la respuesta como string
        curl_setopt($ch, CURLOPT_POST, true);          // Usar método POST
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // Enviar datos como JSON
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $token, // Incluir el token en los encabezados
            'Content-Type: application/json'  // Asegurar el formato JSON
        ]);
    
        // Ejecutar la solicitud
        $response = curl_exec($ch);
    
        // Manejo de errores de cURL
        if ($response === false) {
            $error = curl_error($ch);
            curl_close($ch);
            throw new Exception("Error en la solicitud cURL: " . $error);
        }
    
        // Obtener el código de estado HTTP
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
    
        // Verificar el código de estado HTTP
        if ($httpCode !== 200) {
            throw new Exception("Error en la solicitud. Código de estado: " . $httpCode . ". Respuesta: " . $response);
        }
    
        // Decodificar y retornar la respuesta
        $decodedResponse = json_decode($response, true);
    
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception("Error al decodificar la respuesta JSON: " . json_last_error_msg());
        }
    
        return $decodedResponse; // Retornar la respuesta como array asociativo
    }
    
    
    
}
