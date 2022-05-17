<?php

require __DIR__ . '/../autoload.php';
require __DIR__ . '/../createdatabase.php';

use classes\News;
use classes\View;

$view = new View;
$view->new = News::getById((int)$_GET['id'], $database);
$view->display(__DIR__ . '\..\templates\article.php');
//include __DIR__ . '\..\templates\article.php';
