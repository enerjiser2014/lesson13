<?php

require_once __DIR__ . '/NewsController.php';

class AdminController
    extends NewsController
{
    public function actionAdd()
    {
        $this->addArticle();
    }

}