<?php
session_start();

class E404Exception
    extends Exception
{
    public function redirect($name)
    {
        $_SESSION['error'] = 'Файл ' .$name . 'не найден';
        header('Location: ./error.php');
    }
}