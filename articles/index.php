<?php
require __DIR__ . '/../autoload.php';

use controllers\Mainpage;

$controller = new Mainpage();
$controller->actionIndex();
