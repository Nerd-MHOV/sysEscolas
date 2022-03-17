<?php

namespace Source\Controllers;

class Web extends Controller
{
    public function __construct($router)
    {
        parent::__construct($router);

        if (!empty($_SESSION["user"])) {
            $this->router->redirect("app.home");
        }
    }

    public function home(): void
    {
        $head = $this->seo->optimize(
            "Home |".site("name"),
            site("desc"),
            $this->router->route("web.home"),
            routeImage("Home"),
            true
        )->render();
        echo $this->view->render("theme/login",[
            "head" => $head
        ]);
    }
    public function escolas(): void
    {
        echo 'escolas';
    }
    public function eventos(): void
    {
        echo 'eventos';
    }
}