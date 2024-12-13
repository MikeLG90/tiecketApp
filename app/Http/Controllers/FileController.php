<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class FileController extends Controller
{
    public function getFile($filename)
    {
        $localPath = "\\\\10.9.35.30\\Imagenes\\img-folios\\archivos\\" . $filename;
    
        if (file_exists($localPath)) {
            $extension = pathinfo($localPath, PATHINFO_EXTENSION);
            $mimeType = 'application/octet-stream'; // Valor por defecto
    
            // Ajustar el Content-Type basado en la extensión
            switch ($extension) {
                case 'pdf':
                    $mimeType = 'application/pdf';
                    break;
                case 'jpg':
                case 'jpeg':
                    $mimeType = 'image/jpeg';
                    break;
                case 'png':
                    $mimeType = 'image/png';
                    break;
                case 'gif':
                    $mimeType = 'image/gif';
                    break;
                // Agregar más tipos según sea necesario
            }
    
            return response()->make(file_get_contents($localPath), 200, [
                'Content-Type' => $mimeType,
                'Content-Disposition' => 'inline; filename="' . basename($localPath) . '"',
            ]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'File not found'], 404);
        }
    }
    
}
