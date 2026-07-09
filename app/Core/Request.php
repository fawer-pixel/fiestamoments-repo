<?php
declare(strict_types=1);

namespace App\Core;

/**
 * ---------------------------------------------------------
 * Fiesta Moments
 * Request
 * Version: 0.1.0-alpha
 * ---------------------------------------------------------
 */

class Request
{
    /**
     * Devuelve el método HTTP.
     */
    public function method(): string
    {
        return strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET');
    }

    /**
     * Devuelve la URI sin parámetros.
     */
    public function uri(): string
    {
        $uri = $_SERVER['REQUEST_URI'] ?? '/';

        $uri = parse_url($uri, PHP_URL_PATH);

        if ($uri === false || $uri === null) {
            return '/';
        }

        // Elimina "/public" cuando se trabaja localmente
        $uri = preg_replace('#^/public#', '', $uri);

        return $uri === '' ? '/' : rtrim($uri, '/');
    }

    /**
     * Devuelve todos los datos GET.
     */
    public function query(): array
    {
        return $_GET;
    }

    /**
     * Devuelve todos los datos POST.
     */
    public function post(): array
    {
        return $_POST;
    }

    /**
     * Obtiene un parámetro GET.
     */
    public function get(string $key, mixed $default = null): mixed
    {
        return $_GET[$key] ?? $default;
    }

    /**
     * Obtiene un parámetro POST.
     */
    public function input(string $key, mixed $default = null): mixed
    {
        return $_POST[$key] ?? $default;
    }

    /**
     * Comprueba si existe un parámetro POST.
     */
    public function has(string $key): bool
    {
        return isset($_POST[$key]);
    }

    /**
     * Devuelve la IP del visitante.
     */
    public function ip(): string
    {
        return $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
    }

    /**
     * Devuelve el User-Agent.
     */
    public function userAgent(): string
    {
        return $_SERVER['HTTP_USER_AGENT'] ?? '';
    }

    /**
     * Indica si la petición es AJAX.
     */
    public function isAjax(): bool
    {
        return (
            isset($_SERVER['HTTP_X_REQUESTED_WITH'])
            && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'
        );
    }

    /**
     * Devuelve todos los encabezados.
     */
    public function headers(): array
    {
        if (function_exists('getallheaders')) {
            return getallheaders();
        }

        return [];
    }
}
