<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>SysEscolas | Painel de Controle</title>
    <link rel="stylesheet" href="<?=INCLUDE_PATH?>public/css/style.css">
</head>
<body>
<div class="container">
    <div class="navigation">
        <ul>
            <li>
                <a href="#">
                    <span class="icon"><i class='bx bxs-cube-alt'></i></span>
                    <span class="title" style="font-size: 22px">SysEscolas</span>
                </a>
            </li>
            <li <?php if(str_contains(@$_GET['url'], 'home') || @$_GET['url'] == ''){ echo 'class="hovered"';}?> />
                <a href="<?=INCLUDE_PATH?>home">
                    <span class="icon"><i class='bx bx-home-alt-2' ></i></span>
                    <span class="title">Home</span>
                </a>
            </li>

            <li <?php if(str_contains(@$_GET['url'], 'escolas')){ echo 'class="hovered"';}?> />
                <a href="<?=INCLUDE_PATH?>escolas">
                    <span class="icon"><i class='bx bxs-graduation' ></i></span>
                    <span class="title">Escolas</span>
                </a>
            </li>
            <li <?php if(str_contains(@$_GET['url'], 'eventos')){ echo 'class="hovered"';}?>>
                <a href="<?=INCLUDE_PATH?>eventos">
                    <span class="icon"><i class='bx bx-calendar-event' ></i></span>
                    <span class="title">Eventos</span>
                </a>
            </li>

            <li>
                <a href="?singout=true">
                    <span class="icon"><i class='bx bx-log-out' ></i></span>
                    <span class="title">Sing Out</span>
                </a>
            </li>
        </ul>
    </div>
</div>

<!--  main  -->
<div class="main">
    <div class="topbar">
        <div class="toggle">
            <i class='bx bx-menu' ></i>
<!--            <ion-icon name="menu-outline"></ion-icon>-->
        </div>
        <!-- search -->
        <div class="search">
            <label>
                <input type="text" placeholder="Search here">
                <i class='bx bx-search' ></i>
            </label>
        </div>
        <!-- userImg -->
        <div class="user">
            <img src="<?=INCLUDE_PATH?>public/img/perfil.jpg" />
        </div>
    </div>


