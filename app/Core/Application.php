<?php
declare(strict_types=1);

namespace App\Core;

class Application
{
    public function run(): void
{
    $router = new Router();

    $router->get('/', function ($request, $response) {

        $response->html('
            <!DOCTYPE html>
            <html lang="es">

            <head>

                <meta charset="UTF-8">

                <title>Fiesta Moments</title>

                <style>

                    body{

                        margin:0;

                        background:#111;

                        color:white;

                        display:flex;

                        justify-content:center;

                        align-items:center;

                        height:100vh;

                        font-family:Arial;

                    }

                    .card{

                        text-align:center;

                        padding:50px;

                        border-radius:15px;

                        background:#1e1e1e;

                        box-shadow:0 0 25px rgba(0,0,0,.35);

                    }

                    h1{

                        margin:0;

                    }

                    p{

                        color:#BBB;

                    }

                </style>

            </head>

            <body>

                <div class="card">

                    <h1>🎉 Fiesta Moments</h1>

                    <p>Router funcionando correctamente</p>

                    <p>Versión '.APP_VERSION.'</p>

                </div>

            </body>

            </html>

        ');

    });

    $router->dispatch(new Request());

}
}
