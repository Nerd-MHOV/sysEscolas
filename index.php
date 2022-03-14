<?php
    ob_start();
    require __DIR__.'/vendor/autoload.php';
    use App\Services\Painel;
    use App\controllers\HomeController;
    use App\Router;
    $homeController = new HomeController();

    if(Painel::logado() == false){
        include('pages/login.php');
        die();
    }


    Router::get('/',function() use ($homeController){
       $homeController->index();
    });
    Router::get('/home',function() use ($homeController){
        $homeController->index();
    });
    Router::get('/escolas',function(){
        echo 'ok';
    });
    Router::get('/eventos',function(){
        echo 'eventos';
    });
    ob_end_flush();