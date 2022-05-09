<?php

require __DIR__ . '/Model.php';
class News extends Model
{
    const TABLE = 'news';
    public $id;
    private $heading;
    private $content;

    public function getHeading(): string
    {
        return $this->heading;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
