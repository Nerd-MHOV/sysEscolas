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
        $this->view = new Engine(dirname(__DIR__,2)."/views");
        $this->view->addData(["router" => $this->router]);

        $this->seo = new Optimizer();
        $this->seo->openGraph(site('name'), site('locale'), 'article');
    }

    public function ajaxResponse(string $param, array $values): string
    {

        return json_encode([$param => $values]);
    }
}