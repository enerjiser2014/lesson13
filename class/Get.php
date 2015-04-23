<?php

class Get
{
    public $get;

    public function __construct()
    {
        $this->get=(object)$_GET;
    }
}
