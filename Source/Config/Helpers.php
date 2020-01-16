<?php

/**
 * @param string|null $param
 * @return string
 */
function site(string $param = null): string
{
    if ($param && !empty(SITE[$param])) {
        //  return SITE[$param];
        return SITE['root'] . "/{$param}";
    }

    return SITE['root'];
}

function assest(string $param):string
{
    return SITE['root']."/Source/Views/assests/{$param}";
}

function flash(string $type = null, string $message = null ): ?string 
{
    if ($type && $message){
        $_SESSION["flash"] = [
            "type" => $type,
            "message" => $message
        ];
        return null;
    }

    if(!empty($_SESSION["flash"]) && $flash = $_SESSION["flash"]){
        unset($_SESSION["flash"]);
        return "<div class\"message{$flash["type"]}\">{$flash["message"]}</div>";
    }

    return null;
}