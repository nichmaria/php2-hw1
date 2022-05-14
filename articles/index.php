<?php

require __DIR__ . '/../classes/Model.php';
require __DIR__ . '/../classes/News.php';

use classes\News;

include __DIR__ . '/../createdatabase.php';

$news = News::findAll($database);
/*
$new = new News();
$new->setHeading('Title');
$new->setContent('Text');
$new->insert($database);
$new->setHeading('updated title');
$new->update($database);*/

include __DIR__ . '\showmainpage.php';
