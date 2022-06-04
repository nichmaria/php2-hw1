<?php

require __DIR__ . '/autoload.php';

use Exceptions\DbException;
use Exceptions\NotFoundException;
use Entities\Url;
use Entities\View;
use Entities\WriteLogger;
use Carbon\Carbon;

$url = Url::make();
$view = new View;
$logger = new WriteLogger;
/*
$now = Carbon::parse('2022-06-03 18:26');
$publishedAt = Carbon::now()->subDays(3);
$diff = $publishedAt->diffForHumans($now);
var_dump($diff);
var_dump($publishedAt->toDateTimeLocalString());
*/
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
