<?php
declare(strict_types=1);

use App\Core\View;

return function ($router): void {

    $router->get('/', function () {

        $view = new View();

        $view->render('home', [

            'message' => 'Bienvenido a Fiesta Moments'

        ]);

    });

};
