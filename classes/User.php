<?php

require __DIR__ . '/Model.php';
class User extends Model
{
    const TABLE = 'users';
    private $email;
    private $name;
}
