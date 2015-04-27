<?php

class E404Exception
    extends Exception
{
    public function redirect($name)
    {
        header('Location: ./error.php');
    }
}