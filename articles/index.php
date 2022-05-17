<?php

require __DIR__ . '/../createdatabase.php';
require __DIR__ . '/../autoload.php';

use classes\News;
use classes\View;

foreach ($_POST as $key => $value) {
    News::deleteById($key, $database);
    echo 'article is successfully deleted';
}

$view = new View();
$view->news = News::findAll($database);
$view->display(__DIR__ . '\..\templates\mainpage.php');
