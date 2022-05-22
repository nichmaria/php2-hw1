<?php

namespace controllers;

use classes\News;
use classes\View;

class CntrlArticles extends Controller
{
    protected function actionIndex(): void
    {
        News::delete($_POST);

        $this->view->news = News::findAll();
        $this->view->display(__DIR__ . '\..\templates\index.php');
    }

    protected function actionShow(): void
    {
        $this->view->new = News::getById($this->id);
        $this->view->display(__DIR__ . '\..\templates\show.php');
    }

    protected function actionCreate(): void
    {
        News::create($_POST);

        $this->view->display(__DIR__ . '\..\templates\create.php');
    }

    protected function actionEdit(): void
    {
        $this->view->new = News::getById($this->id);
        $this->view->new->edit($_POST);

        $this->view->display(__DIR__ . '\..\templates\edit.php');
    }
}
