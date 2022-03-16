<?php

namespace App\Views;
use App\Support\Painel;

class MainView
{
    public static function render($fileName, $arr = [], $header = 'pages/includes/header.php', $footer = 'pages/includes/footer.php')
    {
        $arr['nomeUser'] = 'Nome';  //passar para session
        $arr['cargoUser'] = 'Cargo'; //passar para session
        if(isset($_GET['singout'])){
            Painel::loggout();
        }
        include ($header);
        include ('pages/'.$fileName);
        include ($footer);
        die();
    }
}