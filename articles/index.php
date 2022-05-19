<?php
require __DIR__ . '/../autoload.php';
require __DIR__ . '/../classes/DataBase.php';
require __DIR__ . '/../classes/Config.php';

use controllers\Controller;
use classes\Config;
use classes\DataBase;

$config = Config::make();
$database = DataBase::make($config->dsn, $config->login, $config->password);

$controller = new Controller($database);
$controller->action('Index');
