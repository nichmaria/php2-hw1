<?php

namespace controllers;

use classes\News;
use classes\View;

class Mainpage
{
    public function actionIndex(): void
    {
        require __DIR__ . '/../createdatabase.php';
        News::delete($_POST, $database);

        $view = new View();
        $view->news = News::findAll($database);
        $view->display(__DIR__ . '\..\templates\mainpage.php');
    }
}
