<?php
declare(strict_types=1);

namespace App\Core;

/**
 * ---------------------------------------------------------
 * Fiesta Moments
 * View Engine
 * Version: 0.1.0-alpha
 * ---------------------------------------------------------
 */

class View
{
    /**
     * Renderizar vista
     */
    public function render(string $view, array $data = []): void
    {
        $file = APP_PATH . '/Views/' . $view . '.php';

        if (!is_file($file)) {

            http_response_code(404);

            exit('Vista no encontrada: ' . $view);
        }

        extract($data, EXTR_SKIP);

        require $file;
    }
}
