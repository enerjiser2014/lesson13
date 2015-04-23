<?php

require_once __DIR__ . '/Article.php';

class NewsArticle
    extends Article
{

    protected function getTable()
    {
        return 'news';
    }
} 