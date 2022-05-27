<?php

require __DIR__ . '/autoload.php';

use Exceptions\DbException;
use Exceptions\NotFoundException;
use Entities\Url;
use Entities\View;
use Psr\Log;


$url = Url::make();
$view = new View;

$id = $url->getId();
$action = $url->getAction();
$controller = ucfirst($url->getController());
$controllerName = 'Controllers\\' . $controller . 'Controller';

$controller = new $controllerName($id);
try {
    $controller->action($action);
} catch (DbException $exc) {
    $view->exception = $exc->getMessage();
    $view->display(__DIR__ . '\templates\exception.php');
} catch (NotFoundException $exc) {
    $view->exception = $exc->getMessage();
    $view->display(__DIR__ . '\templates\exception.php');
}
