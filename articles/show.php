<?php

require __DIR__ . '/../autoload.php';

use controllers\Controller;

$controller = new Controller();
$controller->action('Show');
