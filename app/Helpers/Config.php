<?php


namespace App\Helpers;


class Config
{
    public static function get(string $env) : string {
        return getenv($env);
    }
}