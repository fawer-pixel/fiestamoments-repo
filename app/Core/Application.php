<?php
declare(strict_types=1);

namespace App\Core;

class Application
{
    private Router $router;

    public function __construct()
    {
        $this->router = new Router();
    }

    public function run(): void
    {
        $routes = ROUTES_PATH . '/web.php';

        if (!is_file($routes)) {

            exit('No existe el archivo de rutas.');
        }

        $registerRoutes = require $routes;

        $registerRoutes($this->router);

        $this->router->dispatch(new Request());
    }
}
