<?php

require __DIR__ . '/../autoload.php';

use classes\Url;
use controllers\Controller;

$url = Url::make();
$id = $url->getId();
$action = $url->getAction();

$controller = new Controller($id);
$controller->action($action);
