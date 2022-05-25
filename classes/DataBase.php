<?php

namespace classes;

use PDOException;

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
            try {
                DataBase::$database->dbh = new \PDO($dsn, $login, $password);
            } catch (PDOException $e) {
                throw new DbException('incorrect parameters for accessing the database');
            }
        }

        return DataBase::$database;
    }

    public function execute(string $sql, array $arr): bool
    {
        $this->sth = $this->dbh->prepare($sql);
        try {
            $this->sth->execute($arr);
        } catch (PDOException $e) {
            throw new DbException('incorrect query to the database');
        }

        return true;
    }

    public function query(string $sql, string $class, array $arr): array
    {
        $this->sth = $this->dbh->prepare($sql);
        try {
            $this->sth->execute($arr);
        } catch (PDOException $e) {
            throw new DbException('incorrect query to the database');
        }

        return $this->sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }
}
