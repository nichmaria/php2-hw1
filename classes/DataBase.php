<?php

namespace classes;

class DataBase
{
    private \PDO $dbh;
    private \PDOStatement|false $sth;
    public static $database;

    private function __construct()
    {
    }

    public static function make(string $dsn, string $login, string $password): DataBase
    {
        if (DataBase::$database == null) {
            $config = Config::make();
            DataBase::$database = new DataBase($config->dsn, $config->login, $config->password);
            DataBase::$database->dbh = new \PDO($dsn, $login, $password);
        }

        return DataBase::$database;
    }

    public function execute(string $sql, array $arr): bool
    {
        $this->sth = $this->dbh->prepare($sql);
        try {
            $this->sth->execute($arr);
        } catch (\Exception $e) {
            echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
        }

        return true;
    }

    public function query(string $sql, string $class, array $arr): array
    {
        $this->sth = $this->dbh->prepare($sql);
        try {
            $this->sth->execute($arr);
        } catch (\Exception $e) {
            echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
        }

        return $this->sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }
}
