<?php

abstract class Model
{
    const TABLE = '';

    public static function findAll(): array
    {
        $database = new DataBase('mysql:host=127.0.0.1;dbname=test', 'root', '');
        $sql = 'SELECT * FROM ' . static::TABLE;
        return $database->query($sql, static::class, []);
    }

    public static function getById(int $id): News|bool
    {
        $arr = [':id' => $id];
        $database = new DataBase('mysql:host=127.0.0.1;dbname=test', 'root', '');
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id = :id';
        if ($database->query($sql, static::class, $arr) != NULL) {
            $array = $database->query($sql, static::class, $arr);
            return $array[0];
        }
        if ($database->query($sql, static::class, $arr) == NULL) {
            return false;
        }
    }
}
