<?php

namespace classes;

class Url
{
    public static $url;
    private string $action;
    private int $id;
    private array $info;

    private function __construct()
    {
    }

    public static function make(): Url
    {
        if (Url::$url == null) {
            Url::$url = new Url;
            Url::$url->info = explode('/', $_SERVER['REQUEST_URI']);
            if ((int)Url::$url->info[2] * 2 != 0 && empty(Url::$url->info[3])) {
                Url::$url->action = 'Show';
                Url::$url->id = (int)Url::$url->info[2];
            }
            if ((int)Url::$url->info[2] * 2 != 0 && !empty(Url::$url->info[3])) {
                // You can insert another "if" here to check, if info[3] == edit or something else
                Url::$url->action = 'Edit';
                Url::$url->id = (int)Url::$url->info[2];
            }
            if (Url::$url->info[2] == 'create') {
                Url::$url->action = 'Create';
                Url::$url->id = 0;
            }
            if (Url::$url->info[2] == null) {
                Url::$url->action = 'Index';
                Url::$url->id = 0;
            }
        }

        return Url::$url;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function getId(): int
    {
        return $this->id;
    }
}