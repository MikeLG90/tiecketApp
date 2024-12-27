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
        $this->client->setAuthConfig(base_path('credentials.json'));
        $this->client->addScope(Gmail::GMAIL_SEND);
        $this->client->setAccessToken(json_decode(file_get_contents(base_path('token.json')), true));

        if ($this->client->isAccessTokenExpired()) {
            \Log::info('Token expirado, intentando refrescar...');
            $refresh_token = $this->client->getRefreshToken();
            if ($refresh_token) {
                $new_token = $this->client->fetchAccessTokenWithRefreshToken($refresh_token);
                file_put_contents(base_path('token.json'), json_encode($new_token));
                $this->client->setAccessToken($new_token);
                \Log::info('Token refrescado exitosamente.');
            } else {
                \Log::error('No se pudo refrescar el token, no hay refresh_token.');
            }
        }
        
    }

    public function sendEmail($to, $subject, $messageBody)
    {
        $gmail = new Gmail($this->client);

        // Crear el mensaje
        $rawMessage = $this->createMessage($to, $subject, $messageBody);

        // Crear instancia de Google\Service\Gmail\Message
        $emailMessage = new Message();
        $emailMessage->setRaw($rawMessage);

        try {
            $gmail->users_messages->send('me', $emailMessage);
            return "Correo enviado exitosamente";
        } catch (\Exception $e) {
            return "Error al enviar el correo: " . $e->getMessage();
        }
    }

    private function createMessage($to, $subject, $messageBody)
    {
        $email = "To: {$to}\r\n";
        $email .= "Subject: {$subject}\r\n";
        $email .= "Content-Type: text/html; charset=UTF-8\r\n\r\n";
        $email .= $messageBody;

        // Codificar en Base64 URL-Safe
        return rtrim(strtr(base64_encode($email), '+/', '-_'), '=');
    }
}
