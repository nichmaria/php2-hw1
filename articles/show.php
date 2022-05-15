<?php

require __DIR__ . '/../classes/Model.php';
require __DIR__ . '/../classes/News.php';
require __DIR__ . '/../createdatabase.php';

use classes\News;

$new = News::getById((int)$_GET['id'], $database);

include __DIR__ . '\..\templates\article.php';
