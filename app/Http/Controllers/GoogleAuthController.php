<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Client;

class GoogleAuthController extends Controller
{
    public function callback(Request $request)
    {
        $client = new Client();
        $client->setClientId(env('OAUTH_CLIENT_ID'));
        $client->setClientSecret(env('OAUTH_CLIENT_SECRET'));
        $client->setRedirectUri('http://127.0.0.1/callback/google');
        $client->addScope('https://www.googleapis.com/auth/gmail.send');

        // Verificar si hay un código en la solicitud
        if ($request->has('code')) {
            $authCode = $request->input('code');

            // Intercambiar el código por un token
            $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);

            // Guardar el token para uso futuro
            file_put_contents('token.json', json_encode($accessToken));

            return 'Token guardado: ' . json_encode($accessToken);
        }

        return 'Código de autorización no proporcionado.';
    }
}
