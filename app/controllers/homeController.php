<?php

namespace App\Controllers;
use App\Views\MainView;
use App\Models\HomeModel;

class HomeController
{
    public function index()
    {
        MainView::render('home.php',$arr[
                'tituloPagina'=> 'Home';
            ]);
    }
}