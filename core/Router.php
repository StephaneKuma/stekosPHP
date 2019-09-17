<?php


namespace Core;


use AltoRouter;

class Router
{
    /**
     * @var string
     */
    private $viewPath;

    /**
     * @var AltoRouter
     */
    private $router;

    /**
     * Router constructor.
     * @param string $viewPath
     */
    public function __construct(string $viewPath)
    {
        $this->viewPath = $viewPath;
        $this->router = new AltoRouter();
    }

    /**
     * @param string $url
     * @param string $view
     * @param string|null $name
     * @return Router
     * @throws \Exception
     */
    public function get(string $url, string $view, ?string $name = null) : self
    {
        $args = explode('.', $view);
        $view = $args[0] . DIRECTORY_SEPARATOR . $args[1];
        $this->router->map('GET', $url, $view, $name);

        return $this;
    }

    /**
     * @return Router
     */
    public function run() : self
    {
        $match = $this->router->match();
        $view = $match['target'];
        ob_start();
        require_once $this->viewPath . $view .'.php';
        $content = ob_get_clean();
        require_once $this->viewPath . DIRECTORY_SEPARATOR . "layouts" . DIRECTORY_SEPARATOR . 'master.php';

        return $this;
    }
}