<?php

require __DIR__ . '/autoload.php';

$ctrl = !empty($_GET['ctrl']) ? $_GET['ctrl'] : 'News';

$ctrlClassName = 'App\\Controllers\\' . ucfirst($ctrl) . 'Controller';

$method = !empty($_GET['method']) ? $_GET['method'] : 'All';

$method = 'action' . ucfirst($method);


try { // E403Exception

    try { // E404Exception

        $controller = new $ctrlClassName;
        $controller->$method();

    }

    catch (E404Exception $e) {
        echo $e->getMessage();
    }


} catch (E403Exception $e) {
    echo $e->redirect(__DIR__ . "/error.php");
}