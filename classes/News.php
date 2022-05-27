<?php

namespace classes;

class News extends Model
{
    const TABLE = 'news';
    protected string $heading;
    protected string $content;
    public int|null $author_id;
    //do not change accessability of heading and content

    public function __get(string $key): Author|null
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
        if (!empty($income)) {
            $new = new News();
            $new->heading = $income['heading'];
            $new->content = $income['content'];

            $ex = new MultiException();
            if ($income['heading'] == null) {
                $ex[] =  new \Exception('empty heading!');
            }
            if ($income['content'] == null) {
                $ex[] = new \Exception('empty content!');
            }
            $new->insert();
            echo 'your record is successfully saved!';
            throw $ex;
        }
    }

    public function edit(array $income): void
    {
        if (!empty($income)) {

            $this->heading = $income['heading'];
            $this->content = $income['content'];
            $this->update();
            echo 'your record is successfully saved!';

            $ex = new MultiException();
            if ($income['heading'] == null) {
                $ex[] =  new \Exception('empty heading!');
            }
            if ($income['content'] == null) {
                $ex[] = new \Exception('empty content!');
            }
            throw $ex;
        }
    }

    public function getHeading(): string
    {
        return $this->heading;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setHeading(string $heading): void
    {
        $this->heading = $heading;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }
}
