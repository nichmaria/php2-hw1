<?php

require __DIR__ . '/autoload.php';

use classes\DbException;
use classes\NotFoundExc;
use classes\Url;
use classes\View;

$url = Url::make();
$view = new View;

$id = $url->getId();
$action = $url->getAction();
$controller = ucfirst($url->getController());
$cntrlName = 'controllers\Cntrl' . $controller;

$controller = new $cntrlName($id);
try {
    $controller->action($action);
} catch (DbException $exc) {
    $view->exception = $exc->getMessage();
    $view->display(__DIR__ . '\templates\exception.php');
} catch (NotFoundExc $exc) {
    $view->exception = $exc->getMessage();
    $view->display(__DIR__ . '\templates\exception.php');
}
