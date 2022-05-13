<?php

namespace classes;

abstract class Model
{
    const TABLE = '';
    public $id;


    public static function findAll(DataBase $database): array
    {
        //$database = new DataBase('mysql:host=127.0.0.1;dbname=test', 'root', '');
        $sql = 'SELECT * FROM ' . static::TABLE;
        return $database->query($sql, static::class, []);
    }

    public static function getById(int $id, DataBase $database): static
    {
        $arr = [':id' => $id];
        //$database = new DataBase('mysql:host=127.0.0.1;dbname=test', 'root', '');
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id = :id';
        $array = $database->query($sql, static::class, $arr);
        return $array[0];
    }

    public function insert(DataBase $database): bool
    {
        //$database = new DataBase('mysql:host=127.0.0.1;dbname=test', 'root', '');
        $keys = [];
        $preparation = [];
        $substitutions = [];

        foreach ($this as $key => $value) {
            if ($key == 'id') {
                continue;
            }
            $keys[] = $key;
            $preparation[] = ':' . $key;
            $substitutions[':' . $key] = $value;
        }

        $sql = 'INSERT INTO ' . static::TABLE
            . ' (' . implode(', ', $keys) . ') VALUES (' . implode(', ', $preparation) . ')';

        return $database->execute($sql,  $substitutions);
    }
}
