<?php

require __DIR__ . '/../autoload.php';

use controllers\Controller;

$controller = new Controller();

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}
if (empty($_GET['action'])) {
    $action = 'Index';
}
$controller->action($action);
