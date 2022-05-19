<?php

namespace controllers;

use classes\News;
use classes\View;

class Controller
{
    private View $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function action(string $name)
    {
        $methodName = 'action' . $name;
        return $this->$methodName();
    }

    private function actionIndex(): void
    {

        News::delete($_POST);

        $this->view->news = News::findAll();
        $this->view->display(__DIR__ . '\..\templates\mainpage.php');
    }
}
