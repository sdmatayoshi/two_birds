<?php
session_start();
if(!isset($_SESSION['usuario']) || !($_SESSION['usuario']['user_name'] == "NewUser" && $_SESSION['usuario']['password'] == "1f8725853fd67adcd29635cf41eaeea6")){
    header("Location: ../index.php");
}
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use MyApp\Chat;

require dirname(__DIR__) . '/vendor/autoload.php';

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new Chat()
        )
    ),
    8080
);

$server->run();
