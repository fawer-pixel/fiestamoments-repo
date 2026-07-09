<?php
declare(strict_types=1);

require_once dirname(__DIR__) . '/autoload.php';
require_once dirname(__DIR__) . '/config/config.php';

use App\Core\Application;

$app = new Application();

$app->run();
