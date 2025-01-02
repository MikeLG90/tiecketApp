<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Imagick;
use Storage;

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
            ->header("Content-Disposition", 'inline; filename="' . $fileName . '.pdf"');
        }

    public function viewTiff($fileName, $idLibro, $oficinaId)
    {
        // Obtener la ruta del archivo
        $localpath = $this->getLocalPath($oficinaId, $idLibro, $fileName);
    
        // Inicializar Imagick
        $imagick = new Imagick();
        
        // Configuración para mejorar rendimiento
        $imagick->setResolution(72, 72); // Usar menor resolución
        $imagick->readImage($localpath);
         // Convertir a escala de grises
        $imagick->setImageType(Imagick::IMGTYPE_GRAYSCALE);
        $imagick->setImageCompressionQuality(10); // Reducir calidad para acelerar
        $imagick->setImageFormat("pdf");
    
        // Enviar el archivo como PDF directamente
        return response($imagick->getImagesBlob(), 200)
            ->header("Content-Type", "application/pdf")
            ->header("Content-Disposition", 'inline; filename="preview.pdf"');
    }
    
    private function getLocalPath($oficinaId, $idLibro, $fileName)
    {
        $baseDir = "\\\\10.9.35.165\\Digitalizacion_102008";
        $locations = [
            1 => 'CHETUMAL',
            2 => 'CANCUN',
            3 => 'PLAYA',
            4 => 'COZUMEL',
        ];
        return "{$baseDir}\\{$locations[$oficinaId]}\\{$idLibro}\\{$fileName}";
    }
    public function viewTiffIns($fileName, $oficinaId)
    {
        $nombreArchivo = substr($fileName, 0, -3);
        $nombreArchivoPdf = $nombreArchivo . "pdf";
    
        // Obtener la ruta del archivo
        $localpath = $this->getLocalPathIns($oficinaId, $nombreArchivoPdf);
    
        // Verificar si el archivo existe
        if (!file_exists($localpath)) {
            return response('Archivo no encontrado', 404);
        }
    
        // Retornar el archivo
        return response()->file($localpath, [
            'Content-Type' => 'application/pdf',
        ]);
    }
    
    private function getLocalPathIns($oficinaId, $fileName)
    {
        $baseDir = "C:\\Users\\ADMIN\\Documents\\INSCRIPCIONES-PDF";
        $locations = [
            1 => 'CHETUMAL',
            2 => 'CANCUN',
            3 => 'PLAYA',
            4 => 'COZUMEL',
        ];
        return "{$baseDir}\\{$locations[$oficinaId]}\\{$fileName}";
    }
}
