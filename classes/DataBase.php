<?php

class DataBase
{
    private PDO $dbh;
    private PDOStatement|false $sth;

    public function __construct(string $dsn, string $login, string $password)
    {
        $this->dbh = new PDO($dsn, $login, $password);
    }

    public function execute(string $sql, array $arr): bool
    {
        $this->sth = $this->dbh->prepare($sql);
        try {
            $this->sth->execute($arr);
        } catch (Exception $e) {
            echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
        }

        return $this->sth->execute();
    }

    public function query(string $sql, string $class, array $arr): array
    {
        $this->sth = $this->dbh->prepare($sql);
        try {
            $this->sth->execute($arr);
        } catch (Exception $e) {
            echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
        }

        return $this->sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }
}
