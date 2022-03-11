<?php

namespace App\Views;
class MainView
{
    public static function render($fileName, $arr = [], $header = 'pages/includes/header.php', $footer = 'pages/includes/footer.php')
    {
        $arr['nomeUser'] = 'Nome';  //passar para session
        $arr['cargoUser'] = 'Cargo'; //passar para session

        include ($header);
        include ('pages/'.$fileName);
        include ($footer);
        die();
    }
}