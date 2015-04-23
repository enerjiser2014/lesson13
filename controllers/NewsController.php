<?php

require_once __DIR__ . '/../class/Controller.php';
require_once __DIR__ . '/../models/NewsArticle.php';
require_once __DIR__ . '/../class/View.php';

class NewsController
    extends Controller
{
    public function actionShowArticle() {
        $id = $_GET['id'];
        $newsModel = new NewsArticle($this->siteConfig());
        $this->view->items = $newsModel->getOneRecord($id);
        $this->view->display('article_v.php');
    }
    public function addArticle()
    {
        $title = nl2br($_POST['title']);
        $text = nl2br($_POST['text']);
        $date = nl2br($_POST['date']);
        // здесь что-то, что обрабатывает $title, text, date перед отправкой
        $newsModel = new NewsArticle($this->siteConfig());
        $newsModel->addArticle($title, $text, $date);
        $this->actionAll();
    }
    public function actionAll()
    {
        $newsModel = new NewsArticle($this->siteConfig());
        $this->view->items = $newsModel->getAllRecords();
        $this->view->display('news_v.php');
        /*
        $items = $newsModel->getAllRecords();
        $this->render('news_v', ['items' => $items]);*/
    }

    protected function siteConfig()
    {
        return new Db(__DIR__ . '/../siteconfig.php');
    }

    protected function getTemplatePath() {
        return __DIR__ . '/../views/';
    }

    protected function render($template, $data)
    {
        //extract($data)
        foreach($data as $k => $v ) {
            $$k = $v;
        }
        require $this->getTemplatePath() . '/' . $template . '.php';
    }
}
