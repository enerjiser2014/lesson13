<?php

function __autoload($class)
{
    if (false !== strpos($class, '\\')) {
        $classNameParts = explode('\\', $class);
        if ('App' == $classNameParts[0]) {
            unset($classNameParts[0]);
  //          echo $classNameParts = __DIR__ . '/' . implode('/', $classNameParts) . '.php';

        }
    }
    $paths = [
        __DIR__ . '/class',
        __DIR__ . '/controllers',
        __DIR__ . '/models',
    ];

    foreach($paths as $path)
    {
        $fileName = $path . '/' . $class . '.php';
        if (file_exists($fileName)) {
            require $fileName;
            return true;
        }
    }
    return false;
}