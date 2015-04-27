<?php

require __DIR__ . '/autoload.php';

$ctrl = !empty($_GET['ctrl']) ? $_GET['ctrl'] : 'News';

$ctrlClassName = ucfirst($ctrl) . 'Controller';

$method = !empty($_GET['method']) ? $_GET['method'] : 'All';

$method = 'action' . ucfirst($method);

//echo $ctrl . '<br>' . $method . '<br>';
$controller = new $ctrlClassName;
$controller->$method($itemsList);
