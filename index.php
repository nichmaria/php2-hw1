<?php

require __DIR__ . '/classes/DataBase.php';
require __DIR__ . '/classes/Model.php';
require __DIR__ . '/classes/News.php';
require __DIR__ . '/classes/Config.php';

use classes\DataBase;
use classes\News;
use classes\Config;

$config = Config::readConfig();

$database = new DataBase($config->dsn, $config->login, '');

$news = News::findAll($database);

$new = new News();
$new->setHeading('Title');
$new->setContent('Text');

//$new->insert($database);



include __DIR__ . '\newspage.php';
