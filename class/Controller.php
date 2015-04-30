<?php

namespace App\Controllers;

require_once __DIR__ . '/View.php';

abstract class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }
}