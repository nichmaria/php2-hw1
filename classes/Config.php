<?php

namespace classes;

class Config
{
    public static $config;
    public $dsn;
    public $login;
    public $password;

    private function __construct()
    {
    }

    public static function readConfig()
    {
        if (Config::$config == null) {
            Config::$config = new Config;
            $info = file(__DIR__ . '\..\config.txt', FILE_IGNORE_NEW_LINES);
            Config::$config->dsn = 'mysql:host=' . $info[0] . ';dbname=' . $info[1];
            Config::$config->login = $info[2];
            Config::$config->password = $info[3];
        }

        return Config::$config;
    }
}
