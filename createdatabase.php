<?php

require __DIR__ . '/classes/DataBase.php';
require __DIR__ . '/classes/Config.php';

use classes\Config;
use classes\DataBase;

$config = Config::make();
$database = new DataBase($config->dsn, $config->login, $config->password);
