<?php
declare(strict_types=1);

namespace App\Core;

/**
 * ---------------------------------------------------------
 * Fiesta Moments
 * Response
 * Version: 0.1.0-alpha
 * ---------------------------------------------------------
 */

class Response
{
    /**
     * Código HTTP
     */
    public function status(int $code): self
    {
        http_response_code($code);

        return $this;
    }

    /**
     * Tipo de contenido
     */
    public function contentType(string $type): self
    {
        header("Content-Type: {$type}; charset=UTF-8");

        return $this;
    }

    /**
     * Texto plano
     */
    public function text(string $content): void
    {
        $this->contentType('text/plain');

        echo $content;
    }

    /**
     * HTML
     */
    public function html(string $content): void
    {
        $this->contentType('text/html');

        echo $content;
    }

    /**
     * JSON
     */
    public function json(array|object $data): void
    {
        $this->contentType('application/json');

        echo json_encode(
            $data,
            JSON_PRETTY_PRINT
            | JSON_UNESCAPED_UNICODE
            | JSON_UNESCAPED_SLASHES
        );
    }

    /**
     * Redireccionar
     */
    public function redirect(string $url): never
    {
        header("Location: {$url}");

        exit;
    }

    /**
     * Descargar archivo
     */
    public function download(string $file, ?string $name = null): never
    {
        if (!is_file($file)) {

            $this->status(404);

            exit('Archivo no encontrado.');
        }

        $downloadName = $name ?? basename($file);

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $downloadName . '"');
        header('Content-Length: ' . filesize($file));

        readfile($file);

        exit;
    }

    /**
     * Error 404
     */
    public function notFound(): void
    {
        $this->status(404);

        $this->html('<h1>404</h1><p>Página no encontrada.</p>');
    }

    /**
     * Error 403
     */
    public function forbidden(): void
    {
        $this->status(403);

        $this->html('<h1>403</h1><p>Acceso denegado.</p>');
    }

    /**
     * Error 500
     */
    public function serverError(): void
    {
        $this->status(500);

        $this->html('<h1>500</h1><p>Error interno del servidor.</p>');
    }
}
