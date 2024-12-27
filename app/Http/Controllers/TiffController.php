<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Imagick;

class TiffController extends Controller
{
    public function index()
    {
        return view("viewer-tiff");
    }
    public function previewTiff(Request $request)
    {
        // Subir el archivo TIFF desde el formulario
        $file = $request->file("tiff");
        $filePath = $file->getRealPath();

        // Crear instancia de Imagick
        $imagick = new Imagick();
        $imagick->readImage($filePath);
        $imagick->setImageFormat("pdf"); // Convertir a PDF

        // Enviar el archivo PDF como respuesta al navegador
        return response($imagick->getImagesBlob(), 200)
            ->header("Content-Type", "application/pdf")
            ->header("Content-Disposition", 'inline; filename="preview.pdf"');
    }

    public function viewTiff($fileName, $idLibro, $oficinaId)
    {
        
        // Inicializar la variable localpath
        $localpath = '';
        // Buscar la imagen tiff dentro del servidor de imagenes según la oficina
        switch ($oficinaId) {
            case 1:
                $localpath = "\\\\10.9.35.165\\Digitalizacion_102008\\CHETUMAL\\$idLibro\\" . $fileName;
                break;
            case 2:
                $localpath = "\\\\10.9.35.165\\Digitalizacion_102008\\CANCUN\\$idLibro\\" . $fileName;
                break;
            case 3:
                $localpath = "\\\\10.9.35.165\\Digitalizacion_102008\\PLAYA\\$idLibro\\" . $fileName;
                break;
            case 4:
                $localpath = "\\\\10.9.35.165\\Digitalizacion_102008\\COZUMEL\\$idLibro\\" . $fileName;
                break;
        }

        // Inicializar nueva instancia de Imagick para la conversión a PDF
        $imagick = new Imagick();
        $imagick->readImage($localpath);
        $imagick->setImageFormat("pdf");

        //Enviar archivo como pdf
        return response($imagick->getImagesBlob(), 200)
            ->header("Content-Type", "application/pdf")
            ->header("Content-Disposition", 'inline; filename="preview.pdf"');

    }
}
