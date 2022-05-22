<?php

require __DIR__ . '/autoload.php';

use classes\Url;
//use controllers\CntrlArticles;
//use controllers\Controller;

$url = Url::make();

$id = $url->getId();
$action = $url->getAction();
$controller = ucfirst($url->getController());
$cntrlName = 'controllers\Cntrl' . $controller;

$controller = new $cntrlName($id);
$controller->action($action);
