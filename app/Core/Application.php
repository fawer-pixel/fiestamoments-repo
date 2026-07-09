<?php
declare(strict_types=1);

namespace App\Core;

class Application
{
    public function run(): void
    {
        echo '<!DOCTYPE html>';
        echo '<html lang="es">';
        echo '<head>';
        echo '<meta charset="UTF-8">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '<title>' . APP_NAME . '</title>';

        echo '<style>
            body{
                margin:0;
                font-family:Arial,Helvetica,sans-serif;
                background:#111;
                color:#FFF;
                display:flex;
                justify-content:center;
                align-items:center;
                height:100vh;
            }

            .card{
                background:#1d1d1d;
                padding:40px;
                border-radius:12px;
                text-align:center;
                box-shadow:0 0 30px rgba(0,0,0,.35);
            }

            h1{
                margin:0;
                font-size:42px;
            }

            p{
                color:#BBB;
            }

            .ok{
                color:#2ECC71;
                margin-top:20px;
                font-weight:bold;
            }
        </style>';

        echo '</head>';
        echo '<body>';

        echo '<div class="card">';

        echo '<h1>🎉 Fiesta Moments</h1>';

        echo '<p>Version ' . APP_VERSION . '</p>';

        echo '<div class="ok">CORE iniciado correctamente</div>';

        echo '</div>';

        echo '</body>';

        echo '</html>';
    }
}
