<?php


namespace Core\Renderer;


use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class TwigRenderer implements RendererInterface
{
    /***
     * @var FilesystemLoader
     */
    private $loader;

    /***
     * @var Environment
     */
    private $twig;

    public function __construct(FilesystemLoader $loader, Environment $twig)
    {
        $this->loader = $loader;
        $this->twig = $twig;
    }

    /**
     * Rajoute un chemin pour charger les vues
     *
     * @param string $namespace
     * @param null|string $path
     * @throws LoaderError
     */
    public function addPath(string $namespace, ?string $path = null): void
    {
        $this->loader->addPath($path, $namespace);
    }

    /**
     * Rend une vue
     * Le chemin peut être précisé avec des namespaces rajoutés vias addPath()
     * $this->render('@blog/show')
     * $this->render('view')
     *
     * @param string $view
     * @param array $params
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function render(string $view, array $params = null): string
    {
        return $this->twig->render($view . 'twig', $params);
    }

    /**
     * Rajoute des variables globales à toutes mes vues
     *
     * @param string $key
     * @param mixed $value
     */
    public function addGlobal(string $key, $value): void
    {
        $this->twig->addGlobal($key, $value);
    }
}