<?php
namespace App\Services;

use Google\Client;
use Google\Service\Gmail;
use Google\Service\Gmail\Message;

class GmailService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
        $this->client->setClientId(env('OAUTH_CLIENT_ID'));
        $this->client->setClientSecret(env('OAUTH_CLIENT_SECRET'));
        $this->client->setRedirectUri(env('OAUTH_REDIRECT_URI'));
        $this->client->addScope('https://www.googleapis.com/auth/gmail.send');
    }

    public function sendEmail($to, $subject, $message)
    {
        // Obtener el token de la sesión o de la base de datos
        $token = session('gmail_token');

        if (!$token) {
            return ['error' => 'No se encontró el token de acceso.'];
        }

        $this->client->setAccessToken($token);

        // Si el token ha expirado, refrescarlo
        if ($this->client->isAccessTokenExpired()) {
            $refreshToken = $this->client->getRefreshToken();
            $this->client->fetchAccessTokenWithRefreshToken($refreshToken);
            $newToken = $this->client->getAccessToken();
            session(['gmail_token' => $newToken]);
        }

        // Crear el servicio Gmail
        $service = new Gmail($this->client);

        // Crear el mensaje
        $rawMessage = $this->createMessage($to, $subject, $message);
        $gmailMessage = new Message();
        $gmailMessage->setRaw($rawMessage);

        // Enviar el correo
        try {
            $service->users_messages->send('me', $gmailMessage);
            return ['success' => 'Correo enviado correctamente.'];
        } catch (\Exception $e) {
            return ['error' => 'Error al enviar el correo: ' . $e->getMessage()];
        }
    }

    private function createMessage($to, $subject, $message)
    {
        $boundary = uniqid(rand(), true);
        $rawMessage = "To: $to\r\n";
        $rawMessage .= "Subject: $subject\r\n";
        $rawMessage .= "MIME-Version: 1.0\r\n";
        $rawMessage .= "Content-Type: multipart/alternative; boundary=$boundary\r\n\r\n";
        $rawMessage .= "--$boundary\r\n";
        $rawMessage .= "Content-Type: text/html; charset=UTF-8\r\n";
        $rawMessage .= "Content-Transfer-Encoding: base64\r\n\r\n";
        $rawMessage .= base64_encode($message) . "\r\n";
        $rawMessage .= "--$boundary--";

        return base64_encode($rawMessage);
    }
}