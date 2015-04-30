<?php

namespace App\Controllers;

abstract class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new \View();
    }
}