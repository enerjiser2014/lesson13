<?php

function __autoload($class)
{
    if (false !== strpos($class, '\\')) {
        $classNameParts = explode('\\', $class);
    //    var_dump($classNameParts);
        if ('App' == $classNameParts[0]) {
            unset($classNameParts[0]);

            $paths = [
                __DIR__ . '/class',
                __DIR__ . '/controllers',
                __DIR__ . '/models',
            ];

            foreach($paths as $path):
                unset($classNameParts[1]);
                $fileName = $path. '/' . implode('/', $classNameParts) . '.php';

                if (file_exists($fileName)) {
                    echo $fileName . '<br>';
                    require_once $fileName;
                }
            endforeach;

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