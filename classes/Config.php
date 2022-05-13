<?php

namespace classes;

class Config
{
    public static $config;
    public $info;

    private function __construct()
    {
    }

    public static function readConfig()
    {
        if (Config::$config == null) {
            Config::$config = new Config;
            Config::$config->info = file(__DIR__ . '\..\config.txt', FILE_IGNORE_NEW_LINES);
        }

        return Config::$config;
    }
}
