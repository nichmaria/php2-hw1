<?php

require __DIR__ . '/../autoload.php';

use controllers\Controller;

$arr = explode('/', $_SERVER['REQUEST_URI']);
$info = explode('?', $arr[2]);

$controller = new Controller();
$action = $info[0] ?: 'Index';
$controller->action($action);
