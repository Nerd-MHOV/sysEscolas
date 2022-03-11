<?php

namespace App\Controllers;
use App\Views\MainView;
use App\Models\HomeModel;

class HomeController
{
    public function index()
    {
        $data['tituloPagina'] = 'Painel';
        MainView::render('home.php',$data);
    }
}