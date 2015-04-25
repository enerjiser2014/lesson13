<?php

require_once __DIR__ . '/../class/Controller.php';
require_once __DIR__ . '/../models/NewsArticle.php';
require_once __DIR__ . '/../class/View.php';

class NewsController
    extends Controller
{
    public function actionShowArticle() {
        $id = $_GET['id'];
        $this->view->items = NewsArticle::getOneRecord($id);
        $this->view->display('article_v.php');
    }
    public function addArticle()
    {
        $title = nl2br($_POST['title']);
        $text = nl2br($_POST['text']);
        $date = nl2br($_POST['date']);
        // здесь что-то, что обрабатывает $title, text, date перед отправкой
        $newsModel = new NewsArticle($this->siteConfig());
        $newsModel->title = $title;
        $newsModel->text = $text;
        $newsModel->date = $date;
        $newsModel->insert();
        $this->actionAll();
    }
    public function actionAll()
    {
        $this->view->items = NewsArticle::getAllRecords();
        $this->view->display('news_v.php');
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
