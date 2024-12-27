<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GmailService;

class GmailController extends Controller
{
    protected $gmailService;

    public function __construct(GmailService $gmailService)
    {
        $this->gmailService = $gmailService;
    }

    public function sendEmail(Request $request)
    {
        $to = "mikeprime99@gmail.com";
        $subject = "Prueba de correo";
        $message = "<h1>Hola bb</h1><p>Este es un mensaje enviado desde SIDRPP xd.</p>";

        $response = $this->gmailService->sendEmail($to, $subject, $message);
        return response()->json($response);
    }
}
