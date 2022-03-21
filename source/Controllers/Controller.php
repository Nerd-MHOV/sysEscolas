<?php

namespace Source\Controllers;
use CoffeeCode\Optimizer\Optimizer;
use CoffeeCode\Router\Router;
use League\Plates\Engine;

abstract class Controller
{
    protected Engine $view;
    protected Router $router;
    protected Optimizer $seo;

    public function __construct($router)
    {
        $this->router = $router;
        $this->view = new Engine(dirname(__DIR__,2)."/views", "php");
        $this->view->addData(["router" => $this->router]);

        $this->seo = new Optimizer();
        $this->seo->openGraph(site('name'), site('locale'), "article")
                    ->publisher("","")
                    ->twitterCard("","","")
                    ->facebook("");
    }

    public function ajaxResponse(string $param, array $values): string
    {

        return json_encode([$param => $values]);
    }
}