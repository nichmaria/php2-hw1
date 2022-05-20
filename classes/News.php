<?php

namespace classes;

class News extends Model
{
    const TABLE = 'news';
    protected string $heading;
    protected string $content;
    public int|null $author_id;
    //do not change accessability of heading and content

    public function __get(string $key)
    {
        if ($key == 'author') {
            $config = Config::make();
            $database = DataBase::make($config->dsn, $config->login, $config->password);

            return Author::getById($this->author_id, $database);
        }
        if ($key != 'author') {
            return null;
        }
    }

    public function __isset(string $key): bool
    {
        if ($key == 'author') {
            return true;
        }
        if ($key != 'author') {
            return false;
        }
    }

    public static function delete(array $list): void
    {
        $config = Config::make();
        $database = DataBase::make($config->dsn, $config->login, $config->password);

        foreach ($list as $key => $value) {
            News::deleteById($key, $database);
            echo 'article is successfully deleted';
        }
    }

    public static function create(array $income): void
    {
        $new = new News();
        if (!empty($income['heading'])) {
            $new->setHeading($income['heading']);
            $new->setContent($income['content']);
            $new->insert();
            echo 'your record is successfully saved!';
        }
    }
    /*
    public function edit(array $income): void
    {
        if (!empty($income['heading']) && !empty($income['content'])) {
            $this->new->setHeading($income['heading']);
            $this->new->setContent($income['content']);
            $this->new->insert();
            echo 'your record is successfully saved!';
        }
    }*/

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
