<?php

namespace controllers;

use classes\News;
use classes\View;
use classes\Config;
use classes\DataBase;

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
        $this->view->display(__DIR__ . '\..\templates\index.php');
    }

    private function actionShow(): void
    {
        $this->view->new = News::getById((int)$_GET['id']);
        $this->view->display(__DIR__ . '\..\templates\show.php');
    }

    private function actionCreate(): void
    {
        News::create($_POST);

        $this->view->display(__DIR__ . '\..\templates\create.php');
    }

    private function actionEdit(): void
    {
        $this->view->new = News::getById((int)$_GET['id']);
        $this->view->new->edit($_POST);

        $this->view->display(__DIR__ . '\..\templates\edit.php');
    }
}
