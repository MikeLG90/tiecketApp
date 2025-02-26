<?php 

namespace App\Services;

use Mailjet\Client;
use Mailjet\Resources;

class MailjetService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client(
            env('MAILJET_API_KEY'),
            env('MAILJET_SECRET_KEY'),
            true,
            ['versión' => 'v3.1']
        );
    }

    public function sendEmail($fromEmail, $fromName, $toEmail, $toName, $subject, $htmlContent)
    {
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => $fromEmail,
                        'Name'  => $fromName,
                    ],
                    'To' => [
                        [
                            'Email' => $toEmail,
                            'Name'  => $toName,
                        ],
                    ],
                    'Subject'  => $subject,
                    'HTMLPart' => $htmlContent,
                ],
            ],
        ];

        try {
            $response = $this->client->post(Resources::$Email, [
                'body' => $body
            ]);
            return "Correo enviado exitosamente. ";
        } catch(\Exception $e) {
            return "Error al enviar el correo: " . $e->getMessage();
        }

    }

}