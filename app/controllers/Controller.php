<?php

namespace App\Controllers;
use CoffeeCode\Optimizer\Optimizer;
use CoffeeCode\Router\Router;
use League\Plates\Engine;

abstract class Controller
{
    /** @var Engine */
    protected $view;
    /** @var Router */
    protected $router;
    /** @var Optimizer */
    protected $seo;

    public function __construct($router)
    {
        $this->router = $router;
        $this->view = Engine::setDirectory(dirname(__DIR__,2)."/views");
        $this->view->addData(["router" => $this->router]);

    }
}