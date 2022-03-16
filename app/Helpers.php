<?php

/**
 * @param string|null $param
 * @return string
 */
function site(string $param = null): string
{
    if($param && !empty(SITE[$param])){
        return SITE[$param];
    }

    return SITE['root'];
}

/**
 * @param string $path
 * @return string
 */
function puclic(string $path): string
{
    return SITE["root"]."/views/public/{$path}";
}

/**
 * @param string|null $type
 * @param string|null $message
 * @return string|null
 */
function flash(string $type = null, string $message = null): ?string
{
    if($type && $message){
        $_SESSION["flash"] = [
          "type" => $type,
          "messagem" => $message
        ];
        return null;
    }
    if(!empty($_SESSION["flash"]) && $flash = $_SESSION["flash"]){
        unset($_SESSION["flash"]);
        return /** @lang text */ "<div class=\"message {$flash["type"]}\">{$flash["message"]}</div>";
    }
    return null;
}