<?php
declare(strict_types=1);

namespace App\Core;

/**
 * ---------------------------------------------------------
 * Fiesta Moments
 * Base Controller
 * Version: 0.1.0-alpha
 * ---------------------------------------------------------
 */

abstract class Controller
{
    protected Request $request;
    protected Response $response;
    protected View $view;

    public function __construct()
    {
        $this->request = new Request();
        $this->response = new Response();
        $this->view = new View();
    }

    /**
     * Renderizar una vista
     */
    protected function render(string $view, array $data = []): void
    {
        $this->view->render($view, $data);
    }

    /**
     * Respuesta JSON
     */
    protected function json(array|object $data): void
    {
        $this->response->json($data);
    }

    /**
     * Redireccionar
     */
    protected function redirect(string $url): never
    {
        $this->response->redirect($url);
    }
}
