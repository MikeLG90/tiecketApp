<?php
require 'vendor/autoload.php';

use Google\Client;
use Dotenv\Dotenv;

// Cargar variables de entorno desde .env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$client = new Client();
$client->setClientId($_ENV['OAUTH_CLIENT_ID']);
$client->setClientSecret($_ENV['OAUTH_CLIENT_SECRET']);
$client->setRedirectUri('http://127.0.0.1/callback/google');
$client->addScope('https://www.googleapis.com/auth/gmail.send');

// Generar la URL para autorizar
echo "Ve a esta URL para autorizar el acceso:\n";
echo $client->createAuthUrl() . "\n";

// Una vez que obtengas el código, introdúcelo aquí
echo "Introduce el código de autorización:\n";
$authCode = trim(fgets(STDIN));

// Intercambia el código por el token
$accessToken = $client->fetchAccessTokenWithAuthCode($authCode);

print_r($accessToken);
?>