<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Client;
use Google\Service\Gmail;
use Google\Service\Gmail\Message;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        $client = new Client();
        $client->setClientId(env('OAUTH_CLIENT_ID'));
        $client->setClientSecret(env('OAUTH_CLIENT_SECRET'));
        $client->setRedirectUri(env('OAUTH_REDIRECT_URI'));
        $client->addScope('https://www.googleapis.com/auth/gmail.send');

        $authUrl = $client->createAuthUrl();
        return redirect($authUrl);
    }

    public function callback(Request $request)
    {
        $client = new Client();
        $client->setClientId(env('OAUTH_CLIENT_ID'));
        $client->setClientSecret(env('OAUTH_CLIENT_SECRET'));
        $client->setRedirectUri(env('OAUTH_REDIRECT_URI'));

        if ($request->has('code')) {
            $authCode = $request->input('code');
            $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);

            // Guardar el token en la sesión o en la base de datos
            session(['gmail_token' => $accessToken]);

            return 'Token guardado: ' . json_encode($accessToken);
        }

        return 'Código de autorización no proporcionado.';
    }
}