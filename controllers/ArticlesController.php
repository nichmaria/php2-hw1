<?php

namespace Controllers;

use Exceptions\MultiException;
use Entities\News;
use Exceptions\NotFoundException;
use Entities\AdminDataTable;


class ArticlesController extends Controller
{
    protected function actionIndex(): void
    {
        News::delete($_POST);

        $this->view->news = News::findAll();

        $funcOne = function ($object) {
            return str_replace(' ', '_', $object->getContent());
        };

        $funcTwo = function ($object) {
            return str_replace(' ', '000', $object->getContent());
        };

        $functions = [$funcOne, $funcTwo,];

        $table = new AdminDataTable($this->view->news, $functions);

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
