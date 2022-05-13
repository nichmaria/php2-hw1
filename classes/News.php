<?php

namespace classes;

class News extends Model
{
    const TABLE = 'news';
    protected $heading;
    protected $content;

    public function getHeading(): string
    {
        return $this->heading;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setHeading(string $heading)
    {
        $this->heading = $heading;
    }

    public function setContent(string $content)
    {
        $this->content = $content;
    }
}
