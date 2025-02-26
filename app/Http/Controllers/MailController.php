<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MailjetService;

class MailController extends Controller
{
    protected $mailjetservice;

    public function __construct(MailjetService $mailjetService)
    {
        $this->mailjetservice = $mailjetService;
    }

    public function sendTestEmail()
    {
        $fromEmail = 'miguelgomez29117@hotmail.com';
        $fromName = 'Soporte Portales RPPC';
        $toEmail = 'mikeprime99@gmail.com';
        $toName = 'Destinatario';
        $subject = 'Prueba de Mailjet en Laravel';
        $htmlContent = '<h1>Hola, esto es una prueba</h1><p>Este correo fue enviado usando Mailjet en Laravel.</p>';

        $result = $this->mailjetservice->sendEmail($fromEmail, $fromName, $toEmail, $toName, $subject, $htmlContent);

        return $result;    
    }

}
