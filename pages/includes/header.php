<!DOCTYPE html>
<html>
    <head>
        <title>Cadastro e Pagamentos de Escolas</title>
        <meta charset="viewport" content="width=device-width;initial-scale=1.0;maximun-scale=1.0" />
        <link rel="stylesheet" href="<?=INCLUDE_PATH?>public/css/style.css">
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    </head>
</html>
<body>
    <base base="<?=INCLUDE_PATH?>">
    <div class="sidebar close">
        <div class="logo-details">
            <span class="logo_close"><img src="<?=INCLUDE_PATH?>public/img/GP.png"></span>
            <span class="logo_name"><img src="<?=INCLUDE_PATH?>public/img/Grupoperaltas.png"></span>
        </div>
        <ul class="nav-links">

            <li>
                <a href="home">
                    <i class='bx bx-dollar'></i>
                    <span class="link_name">Orçamento</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="home">Orçamento</a></li>
                </ul>
            </li>

            <li>
                <div class="iocn-link">
                    <a href="">
                        <i class='bx bxs-bar-chart-alt-2'></i>
                        <span class="link_name">Controle</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow' ></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="">Controle</a></li>
                    <li><a href="controle-colaborador">Colaborador</a></li>
                </ul>
            </li>

            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <!--<img src="image/profile.jpg" alt="profileImg">-->
                    </div>
                    <div class="name-job">
                        <div class="profile_name"><?=$arr['nomeUser']?></div>
                        <div class="job"><?=$arr['cargoUser']?></div>
                    </div>
                    <a href="?loggout"><i class='bx bx-log-out' ></i></a>
                </div>
            </li>
        </ul>
    </div>

    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu' ></i>
            <span class="text"><?=$arr['tituloPagina']?></span>
        </div>
