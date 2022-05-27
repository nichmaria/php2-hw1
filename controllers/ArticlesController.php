<?php

namespace Controllers;

use Exceptions\MultiException;
use Entities\News;
use Exceptions\NotFoundException;

class ArticlesController extends Controller
{
    protected function actionIndex(): void
    {
        News::delete($_POST);

        $this->view->news = News::findAll();
        $this->view->display(__DIR__ . '\..\templates\index.php');
    }

    protected function actionShow(): void
    {
        try {
            $this->view->new = News::getById($this->id);
        } catch (NotFoundException $exeption) {
            throw new \Exception('page not found', 404);
        }

        $this->view->display(__DIR__ . '\..\templates\show.php');
    }

    protected function actionCreate(): void
    {
        try {
            News::create($_POST);
            $this->view->errors = [];
        } catch (MultiException $e) {
            $this->view->errors = $e;
        }

        $this->view->display(__DIR__ . '\..\templates\create.php');
    }

    protected function actionEdit(): void
    {
        $this->view->new = News::getById($this->id);
        try {
            $this->view->new->edit($_POST);
            $this->view->errors = [];
        } catch (MultiException $e) {
            $this->view->errors = $e;
        }

        $this->view->display(__DIR__ . '\..\templates\edit.php');
    }
}
