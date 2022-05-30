<?php

require __DIR__ . '/autoload.php';

use Exceptions\DbException;
use Exceptions\NotFoundException;
use Entities\Url;
use Entities\View;
use Entities\WriteLogger;


$url = Url::make();
$view = new View;
$logger = new WriteLogger;

$id = $url->getId();
$action = $url->getAction();
$controller = ucfirst($url->getController());
$controllerName = 'Controllers\\' . $controller . 'Controller';

$controller = new $controllerName($id);
try {
    $controller->action($action);
} catch (DbException $exc) {
    $logger->emergency('problems with database', []);
    $view->exception = $exc->getMessage();
    $view->display(__DIR__ . '\templates\exception.php');
} catch (\Exception $exc) {
    $logger->emergency('error 404', []);
    $view->exception = $exc->getMessage();
    $view->display(__DIR__ . '\templates\exception.php');
}
