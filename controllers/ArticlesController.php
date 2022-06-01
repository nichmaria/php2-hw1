<?php

namespace Controllers;

use Exceptions\MultiException;
use Entities\News;
use Exceptions\NotFoundException;
use Entities\AdminDataTable;


class ArticlesController extends Controller
{
    protected function actionDelete(): void
    {
        $id = key($_POST);
        if (gettype($id) == 'integer') {
            News::deleteById($id);
            $this->actionIndex();
        }
        if (gettype($id) != 'integer') {
            throw new \Exception('incorrect data for deleting');
        }
    }

    protected function actionIndex(): void
    {
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
        $this->view->errors = [];
        if (!empty($_POST)) {
            $heading = $_POST['heading'];
            $content = $_POST['content'];

            $ex = new MultiException();

            if (gettype($heading) != 'string') {
                $ex[] =  new \Exception('incorrect type of heading!');
            }
            if (gettype($content) != 'string') {
                $ex[] = new \Exception('incorrect type of content!');
            }
            if ($heading == null) {
                $ex[] =  new \Exception('empty heading!');
            }
            if ($content == null) {
                $ex[] = new \Exception('empty content!');
            }

            try {
                if (!empty($ex->getData())) {
                    throw $ex;
                }

                News::create($heading, $content);
            } catch (MultiException $ex) {
                $this->view->errors = $ex;
            }
        }
        $this->view->display(__DIR__ . '\..\templates\create.php');
    }

    protected function actionEdit(): void
    {
        $this->view->new = News::getById($this->id);
        $this->view->errors = [];

        if (!empty($_POST)) {
            $heading = $_POST['heading'];
            $content = $_POST['content'];

            $ex = new MultiException();

            if (gettype($heading) != 'string') {
                $ex[] =  new \Exception('incorrect type of heading!');
            }
            if (gettype($content) != 'string') {
                $ex[] = new \Exception('incorrect type of content!');
            }
            if ($heading == null) {
                $ex[] =  new \Exception('empty heading!');
            }
            if ($content == null) {
                $ex[] = new \Exception('empty content!');
            }

            try {
                if (!empty($ex->getData())) {
                    throw $ex;
                }

                $this->view->new->edit($heading, $content);
            } catch (MultiException $ex) {
                $this->view->errors = $ex;
            }
        }
        $this->view->display(__DIR__ . '\..\templates\edit.php');
    }
}
