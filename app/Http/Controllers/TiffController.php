<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Imagick;

class TiffController extends Controller
{

    public function index(){

        return view('viewer-tiff');
    }
public function previewTiff(Request $request)
{
    // Subir el archivo TIFF desde el formulario
    $file = $request->file('tiff');
    $filePath = $file->getRealPath();

    // Crear instancia de Imagick
    $imagick = new Imagick();
    $imagick->readImage($filePath);
    $imagick->setImageFormat('pdf'); // Convertir a PDF

    // Enviar el archivo PDF como respuesta al navegador
    return response($imagick->getImagesBlob(), 200)
        ->header('Content-Type', 'application/pdf')
        ->header('Content-Disposition', 'inline; filename="preview.pdf"');
}
}
