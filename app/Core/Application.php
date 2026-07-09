<?php
declare(strict_types=1);

namespace App\Core;

class Application
{
    public function run(): void
{
    $router = new Router();

    $router->get('/', function () {

    $view = new View();

    $view->render('home', [
        'message' => 'Core funcionando correctamente'
    ]);

});

    $router->dispatch(new Request());

}
}
