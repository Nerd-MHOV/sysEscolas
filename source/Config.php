<?php
/**
 * CONFIG SITE DEFAULT
 */
const SITE = [
    "name" => "SysEventos",
    "desc" => "Sistema de pagamentos e cadastro para escolas e evendos",
    "domain" => "nãotenho.com",
    "locale" => "pt_BR",
    "root" => "http://localhost/sysescolas"
];

/**
 * SITE MINIFY
 */
if ($_SERVER["SERVER_NAME"] == "localhost") {
    require __DIR__."/Minify.php";
}

/**
 * DATA CONFIG
 */
const DATA_LAYER_CONFIG = [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3306",
    "dbname" => "sysescolas",
    "username" => "root",
    "passwd" => "",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
];
