<?php

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
        $newsModel = new NewsArticle(Conf::newsDb());
        $newsModel->title = $_POST['title'];
        $newsModel->text = nl2br($_POST['text']);
        $newsModel->date = $_POST['date'];
        $newsModel->insert();
        $this->actionAll();
    }
    public function actionAll()
    {
        $this->view->items = NewsArticle::getAllRecords();
        $this->view->display('news_v.php');
    }

    public function actionForm()
    {
        $id = $_GET['id'];
        $this->view->items = NewsArticle::getAllRecords();
        $this->view->display('form_v.php');
    }

    public function actionEdit()
    {
        $id = $_POST['id'];
        $this->view->items = NewsArticle::getOneRecord($id);
        $this->view->display('formedit_v.php');
    }

    public function actionUpdate($id)
    {
        $model = new NewsArticle(Conf::newsDb());
        $model->id = $_GET['id'];
        $model->title=$_POST['title'];
        $model->text=nl2br($_POST['text']);
        $model->date='27-04-2015';
        $model->update();
        $this->homePage();
    }

    protected  function homePage()
    {
        header('Location: ./index.php');
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
