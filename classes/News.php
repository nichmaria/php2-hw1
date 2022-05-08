<?php

require __DIR__ . '/Model.php';
class News extends Model
{
    const TABLE = 'news';
    private $heading;
    private $content;

    public function getHeading()
    {
        return $this->heading;
    }

    public function getContent()
    {
        return $this->content;
    }
}
