<?php

define(
    "SITE",
    [
        "name" => "#SomosCEM",
        "desc" => "GESTÃO DE MEMBRESIA COMUNIDADE AVIVAMENTO EM CRISTO",
        "domain" => "localhost/",
        //"domain" => "slab.sp.senai.br/",
        "locale" => "pt-br",
        "root" => "http://localhost/newIgreja"
        //"root" => "https://slab.sp.senai.br"
    ]
);


if ($_SERVER["SERVER_NAME"] == "localhost") {
    require __DIR__ . "/Minify.php";
}


define("DATA_LAYER_CONFIG", [
    "driver" => "mysql",
    "host" => "localhost" ,
    "port" => "3306",
    "dbname" => "db_igreja",
    "username" => "brunoorosco",
    "passwd" => "123456",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);

function url(string $param = null): string
{
    if ($param) {
        //  return SITE[$param];
        return SITE['root'] . "/{$param}";
    }

    return SITE['root'];
}


/**
 * SOCIAL
 */
define("SOCIAL", [
    "facebook_page" => "",
    "facebook_author" => "",
    "facebook_appId" => "",
    "twitter_creater" => "",
    "twitter_site" => ""
]);

/**
 * MAIL CONNECT
 */
define("MAIL", []);
