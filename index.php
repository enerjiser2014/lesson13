<?php

$ctrl = !empty($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$ctrlClassName = ucfirst($ctrl) . 'Controller';

$method = !empty($_GET['method']) ? $_GET['method'] : 'All';

/*
if ($ctrl == 'news')
{
    switch ($method) {
        case 'addArticle':
            $method = 'addArticle';
            $itemsList = $_POST;
            break;
        case 'showArticle':
            $method = 'showArticle';
            break;
    default:
        $method = 'action' . $method;
        break;
    }
}
else {
    $method = 'action' . ucfirst($method);
}
*/
$method = 'action' . ucfirst($method);
require __DIR__ . '/controllers/' . $ctrlClassName . '.php';
$controller = new $ctrlClassName;
$controller->$method($itemsList);
