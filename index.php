<?php
ob_start();
session_start();
require __DIR__.'/vendor/autoload.php';
use App\Support\Painel;
use CoffeeCode\Router\Router;
/*
if(Painel::logado() == false){
    include('pages/login.php');
    die();
}
*/
$router = new Router(site());
$router->namespace("App/Controllers");

/**
* HOME WEB
*/
$router->group(null);
$router->get("/","Web:home","web:home");
$router->get("/home","Web:home","web:home");
$router->get("/escolas","Web:escolas","web:escolas");
$router->get("/eventos","Web:home","web:home");

/**
 * ERRORS
 */
$router->group('ops');
$router->get('/{errcode}', "Web:error", "web:error");

/**
 * ROUTE PROCESS
 */
$router->dispatch();

if($router->error()){
    $router->redirect("web.error", ["errcode" => $router->error()]);
}

ob_end_flush();