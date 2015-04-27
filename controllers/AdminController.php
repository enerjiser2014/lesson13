<?php
session_start();

require_once __DIR__ . '/NewsController.php';

class AdminController
    extends NewsController
{
    public function actionAdd()
    {
        $this->addArticle();
    }

    public function ifAuthorized()
    {
        if ($_SESSION['auth'] != 'admin ') {
            throw new E403Exception('Вам необходимо авторизоваться!');
        }
    }
}