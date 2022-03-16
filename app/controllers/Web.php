<?php

namespace App\Controllers;

class Web extends Controller
{
    public function __construct($router)
    {
        parent::__contruct($router);

        if (!empty($_SESSION["user"])) {
            $this->router->redirect("app.home");
        }
    }

    public function home(): void
    {
        echo 'home';
    }
    public function escolas(): void
    {
        echo 'home';
    }
    public function eventos(): void
    {
        echo 'home';
    }
}