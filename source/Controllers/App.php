<?php

namespace Source\Controllers;

use CoffeeCode\DataLayer\DataLayer;
use Source\Models\User;

/**
 *
 */
class App extends Controller
{

    /**
     * @var User|DataLayer|null
     */
    protected User $user;

    /**
     * @param $router
     */
    public function __construct($router)
    {
        parent::__construct($router);

        if(empty($_SESSION["user"]) || !$this->user = (new User())->findById($_SESSION["user"])) {
            unset($_SESSION["user"]);

            flash("error", "Acesso negado. Favor logue-se");
            $this->router->redirect("web.login");
        }

    }

    /**
     * @return void
     */
    public function home(): void
    {
        $head = $this->seo->optimize(
            "Home {$this->user->first_name} | " . site("name"),
            site("desc"),
            $this->router->route('app.home'),
            routeImage("HOME"),
        )->render();
        $this->view->addData(['head' => $head, "user" => $this->user]);
        echo $this->view->render("theme/dashboard");
    }

    /**
     * @return void
     */
    public function logoff(): void
    {
        unset($_SESSION["user"]);

        flash("info", "Você saiu com sucesso, volte logo {$this->user->first_name}");
        $this->router->redirect("web.login");
    }

}