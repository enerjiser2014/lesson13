<?php

function __autoload($class)
{
    if (false !== strpos($class, '\\')) {
        $classNameParts = explode('\\', $class);
        if ('App' == $classNameParts[0]) {
            unset($classNameParts[0]);
            $fileName = __DIR__ . '/' . implode('/', $classNameParts) . '.php';
            if (file_exists($fileName)) {
                require_once $fileName;
                return true;
            }
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
            require_once $fileName;
            return true;
        }
    }
    return false;
}