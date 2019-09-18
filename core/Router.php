<?php


namespace Core;


use Core\Router\Route;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Expressive\Router\FastRouteRouter;
use Zend\Expressive\Router\Route as ZendRoute;

class Router
{
    /***
     * @var FastRouteRouter
     */
    private $router;

    /**
     * Router constructor.
     */
    public function __construct()
    {
        $this->router = new FastRouteRouter();
    }

    /***
     * @param string $path
     * @param string|callable $callable
     * @param string $name
     */
    public function get(string $path, $callable, string $name)
    {
        $this->router->addRoute(new ZendRoute($path, $callable, ['GET'], $name));
    }

    /***
     * @param ServerRequestInterface $request
     * @return Route|null
     */
    public function match(ServerRequestInterface $request) : ?Route
    {
        $result = $this->router->match($request);

        if ($result->isSuccess()) {
            return new Route($result->getMatchedRouteName(), $result->getMatchedParams(), $result->getMatchedParams());
        }
        return null;
    }

    public function generateUri(string $string, array $params) : ?string
    {
        $this->router->generateUri($string, $params);
    }
}