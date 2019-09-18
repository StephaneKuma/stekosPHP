<?php


namespace App\Blog;


use App\Blog\Controllers\BlogController;
use Core\Module;
use Core\Renderer\RendererInterface;
use Core\Router;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class BlogModule extends Module
{
    const DEFINITIONS = __DIR__ . DIRECTORY_SEPARATOR . 'config.php';

    public function __construct(string $prefix, Router $router, RendererInterface $renderer)
    {
        $renderer->addPath('blog', __DIR__ . DIRECTORY_SEPARATOR . 'templates');
        $router->get($prefix, BlogController::class, 'blog.index');
        $router->get($prefix . '/{slug:[a-z\-]+}', BlogController::class, 'blog.show');
    }
}