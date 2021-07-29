<?php

define("ROOT", "http://ajax");
define("THEME", "navbar-dark bg-danger");


function url(string $path): string
{
    if ($path) {
        return ROOT . "/theme/assets{$path}";
    }
    return ROOT;
}

function message(string $message, string $type): string
{
    return "<div class=\"alert alert-{$type} col-sm-4\">{$message}</div>";
}