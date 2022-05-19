<?php

require __DIR__ . '/../autoload.php';
require __DIR__ . '/../classes/DataBase.php';
require __DIR__ . '/../classes/Config.php';

use classes\Config;
use classes\DataBase;
use classes\News;
use classes\View;

$config = Config::make();
$database = DataBase::make($config->dsn, $config->login, $config->password);



$view = new View;
$view->new = News::getById((int)$_GET['id'], $database);
$view->display(__DIR__ . '\..\templates\article.php');
