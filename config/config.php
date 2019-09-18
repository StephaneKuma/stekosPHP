<?php

use Core\Renderer\RendererInterface;
use Core\Renderer\TwigRenderer;
use Core\Renderer\TwigRendererFactory;
use Core\Router;
use Core\Router\RouterTwigExtension;
use Psr\Container\ContainerInterface;
use function DI\{create, get, factory};

return [
    'templates.path' => dirname(__DIR__) . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR,
    'twig.extensions' => [
        get(RouterTwigExtension::class)
    ],
    Router::class => create(),
    RendererInterface::class => factory(TwigRendererFactory::class)
];