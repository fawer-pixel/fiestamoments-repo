<?php
declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| Fiesta Moments
|--------------------------------------------------------------------------
| Autoloader
| Version: 0.1.0-alpha
|--------------------------------------------------------------------------
*/

spl_autoload_register(function (string $class): void {

    $prefix = 'App\\';
    $baseDir = __DIR__ . '/app/';

    $length = strlen($prefix);

    if (strncmp($prefix, $class, $length) !== 0) {
        return;
    }

    $relativeClass = substr($class, $length);

    $file = $baseDir . str_replace('\\', DIRECTORY_SEPARATOR, $relativeClass) . '.php';

    if (is_file($file)) {
        require_once $file;
    }

});
