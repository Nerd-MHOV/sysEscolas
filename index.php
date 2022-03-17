<?php
ob_start();
session_start();
require __DIR__.'/vendor/autoload.php';
use Source\Support\Painel;
use CoffeeCode\Router\Router;
use Source\Controllers\Web;

$router = new Router(site());
$router->namespace("Source\Controllers");

/**
* HOME WEB
*/
$router->group(null);
$router->get("/","Web:home", "web:home");
$router->get("/escolas","Web:escolas","web:escolas");
$router->get("/eventos","Web:eventos","web:eventos");

/**
 * ERRORS
 */
$router->group('ops');
$router->get('/{errcode}', "Web:error", "web:error");

/**
 * ROUTE PROCESS
 */
$router->dispatch();

if ($router->error()) {
    $router->redirect("/ops/{$router->error()}");
}

ob_end_flush();

/*
if(Painel::logado() == false){
    include('pages/login.php');
    die();
}
*/