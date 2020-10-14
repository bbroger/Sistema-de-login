<?php 

// Pasta raiz
define("ROOT", "https://www.localhost/projetos/login");


// Database
define("DATA_LAYER_CONFIG", [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3306",
    "dbname" => "agenda",
    "username" => "root",
    "passwd" => "",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);


// View
define('CONF_PATH_VIEW', 'https://www.localhost/projetos/login/themes/');
define('CONF_VIEW_THEME', 'login/');
define('CONF_VIEW_EXT', 'php');




