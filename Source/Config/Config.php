<?php

// define(
//     "SITE",
//     [
//         "name" => "#Comunidade Avivamento em Cristo",
//         "desc" => "GESTÃO DE MEMBRESIA COMUNIDADE AVIVAMENTO EM CRISTO",
//         "domain" => "192.168.10.105/",
//         //"domain" => "slab.sp.senai.br/",
//         "locale" => "pt-br",
//         "root" => "http://192.168.10.105/newIgreja"
//         //"root" => "https://slab.sp.senai.br"
//     ]
// );
define(
    "SITE",
    [
        "name" => "#Comunidade Avivamento em Cristo",
        "desc" => "GESTÃO DE MEMBRESIA COMUNIDADE AVIVAMENTO EM CRISTO",
        "domain" => "secretariacac.com/teste",
        //"domain" => "slab.sp.senai.br/",
        "locale" => "pt-br",
        "root" => "https://secretariacac.com/teste"
        //"root" => "https://slab.sp.senai.br"
    ]
);


if ($_SERVER["SERVER_NAME"] == "192.168.10.105") {
    require __DIR__ . "/Minify.php";
}


// define("DATA_LAYER_CONFIG", [
//     "driver" => "mysql",
//     "host" => "192.168.10.105" ,
//     "port" => "3306",
//     "dbname" => "db_igreja",
//     "username" => "brunoorosco",
//     "passwd" => "123456",
//     "options" => [
//         PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
//         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
//         PDO::ATTR_CASE => PDO::CASE_NATURAL
//     ]
// ]);
define("DATA_LAYER_CONFIG", [
    "driver" => "mysql",
    "host" => "localhost" ,
    "port" => "3306",
    "dbname" => "u858016896_igr",
    "username" => "u858016896_igr",
    "passwd" => "orosco0329",
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
define("MAIL", [
    // "host" =>"smtp.sendgrid.net",
    // "port" =>"587",
    // "user" => "apikey",
    // "passwd" => "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",
    // "from_name" => "Bruno Orosco",
    // "from_email" => "secretaria@secretariacac.com"
    "host" =>"smtp-relay.sendinblue.com",
    "port" =>"587",
    "user" => "brunoorosco@gmail.com",
    "passwd" => "QNgfFw5JZ3nHUEqR",
    "from_name" => "Bruno Orosco",
    "from_email" => "secretaria@secretariacac.com"
]);
