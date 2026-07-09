<?php
declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| Fiesta Moments
|--------------------------------------------------------------------------
| Configuración General
|--------------------------------------------------------------------------
*/

date_default_timezone_set('America/Chicago');

define('APP_NAME', 'Fiesta Moments');
define('APP_VERSION', '0.1.0-alpha');
define('APP_ENV', 'development');
define('APP_DEBUG', true);

define('BASE_PATH', dirname(__DIR__));

define('APP_PATH', BASE_PATH . '/app');
define('CONFIG_PATH', BASE_PATH . '/config');
define('PUBLIC_PATH', BASE_PATH . '/public');
define('ROUTES_PATH', BASE_PATH . '/routes');
define('STORAGE_PATH', BASE_PATH . '/storage');
define('EVENTS_PATH', BASE_PATH . '/events');
define('LOGS_PATH', BASE_PATH . '/logs');

define('BASE_URL', '/');
