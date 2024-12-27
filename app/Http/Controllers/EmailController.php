<?php

namespace App\Http\Controllers;
use App\Services\GmailService;

class EmailController extends Controller
{
    protected $gmailService;

    public function __construct(GmailService $gmailService)
    {
        $this->gmailService = $gmailService;
    }

    public function enviarCorreo()
    {
        $to = 'miguelgomez29117@hotmail.com';
        $subject = 'Prueba de Envío';
        $body = 'Este es un correo enviado desde Laravel usando Gmail y OAuth 2.0.';

        if ($this->gmailService->sendEmail($to, $subject, $body)) {
            return 'Correo enviado exitosamente!';
        } else {
            return 'Error al enviar el correo.';
        }
    }
}
