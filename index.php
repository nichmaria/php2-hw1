<?php

require __DIR__ . '/classes/DataBase.php';
require __DIR__ . '/classes/Model.php';
require __DIR__ . '/classes/News.php';
require __DIR__ . '/classes/Config.php';

use classes\DataBase;
use classes\News;
use classes\Config;

$config = Config::readConfig();
$dsn = 'mysql:host=' . $config->info[0] . ';dbname=' . $config->info[1];
$login = $config->info[2];
$password = $config->info[3];

$database = new DataBase($dsn, $login, '');

$news = News::findAll($database);

$new = new News();
$new->setHeading('Title');
$new->setContent('Text');

//$new->insert($database);



include __DIR__ . '\newspage.php';
