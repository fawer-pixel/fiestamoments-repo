<?php
declare(strict_types=1);

namespace App\Core;

/**
 * ---------------------------------------------------------
 * Fiesta Moments
 * Router
 * Version: 0.1.0-alpha
 * ---------------------------------------------------------
 */

class Router
{
    /**
     * Rutas registradas.
     *
     * @var array<string, array<string, callable>>
     */
    private array $routes = [];

    /**
     * Registrar ruta GET.
     */
    public function get(string $uri, callable $callback): void
    {
        $this->addRoute('GET', $uri, $callback);
    }

    /**
     * Registrar ruta POST.
     */
    public function post(string $uri, callable $callback): void
    {
        $this->addRoute('POST', $uri, $callback);
    }

    /**
     * Registrar ruta.
     */
    private function addRoute(string $method, string $uri, callable $callback): void
    {
        $uri = $this->normalize($uri);

        $this->routes[$method][$uri] = $callback;
    }

    /**
     * Ejecutar router.
     */
    public function dispatch(Request $request): void
    {
        $method = $request->method();
        $uri = $this->normalize($request->uri());

        $response = new Response();

        if (
            isset($this->routes[$method]) &&
            isset($this->routes[$method][$uri])
        ) {
            call_user_func($this->routes[$method][$uri], $request, $response);
            return;
        }

        $response->notFound();
    }

    /**
     * Normalizar URI.
     */
    private function normalize(string $uri): string
    {
        $uri = trim($uri);

        if ($uri === '') {
            return '/';
        }

        $uri = '/' . trim($uri, '/');

        return $uri;
    }
}
