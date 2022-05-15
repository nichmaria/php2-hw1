<?php

require __DIR__ . '/../classes/Model.php';
require __DIR__ . '/../classes/News.php';
require __DIR__ . '/../createdatabase.php';

use classes\News;

foreach ($_POST as $key => $value) {
    News::deleteById($key, $database);
    echo 'article is successfully deleted';
}

$news = News::findAll($database);

include __DIR__ . '\..\templates\mainpage.php';
