<?php

require __DIR__ . '/classes/DataBase.php';
require __DIR__ . '/classes/News.php';

$news = News::findAll();

include __DIR__ . '\newspage.php';
