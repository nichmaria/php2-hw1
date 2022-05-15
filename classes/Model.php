<?php

namespace classes;

abstract class Model
{
    const TABLE = '';
    public $id;


    public static function findAll(DataBase $database): array
    {
        $sql = 'SELECT * FROM ' . static::TABLE;
        return $database->query($sql, static::class, []);
    }

    public static function getById(int $id, DataBase $database): static
    {
        $substitution = [':id' => $id];
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id = :id';
        $array = $database->query($sql, static::class, $substitution);
        return $array[0];
    }

    public function isnew(DataBase $database): bool
    {
        $substitution = [':heading' => $this->heading];
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE heading = :heading';
        $array = $database->query($sql, static::class, $substitution);
        if ($array == null) {
            return false;
        }
        if ($array != null) {
            return true;
        }
    }

    public static function deleteById(int $id, DataBase $database): bool
    {
        $substitution = [':id' => $id];
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id = :id';
        $array = $database->execute($sql, $substitution);
        return true;
    }

    public function insert(DataBase $database): bool
    {
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

        $database->execute($sql,  $substitutions);

        $sql = 'SELECT *
        FROM ' . static::TABLE .
            ' ORDER BY id DESC
        LIMIT 1';

        $array = $database->query($sql, static::class, []);
        $this->id = $array[0]->id;
        return true;
    }

    public function update(DataBase $database): bool
    {
        $keys = [];
        $preparation = [];
        $substitutions = [];

        foreach ($this as $key => $value) {
            if ($key == 'id') {
                continue;
            }
            $keys[] = $key;
            $preparation[] = $key . '= :' . $key;
            $substitutions[':' . $key] = $value;
        }

        $sql = 'UPDATE ' .  static::TABLE . ' SET ' . implode(', ', $preparation) . ' WHERE  `id`=' . $this->id;
        $database->execute($sql,  $substitutions);
        return true;
    }
}
