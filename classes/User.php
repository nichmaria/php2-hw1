<?php

namespace classes;

class User extends Model
{
    const TABLE = 'users';
    private string $email;
    private string $name;
}
