<?php
    require __DIR__.'/vendor/autoload.php';
    use App\Controllers\HomeController;
    use App\Router;
    $homeController = new HomeController();

    Router::get('/',function() use ($homeController){
       $homeController->index();
    });