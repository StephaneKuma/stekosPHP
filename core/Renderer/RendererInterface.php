<?php


namespace Core\Renderer;


interface RendererInterface
{
    /**
     * Rajoute un chemin pour charger les vues
     *
     * @param string $namespace
     * @param null|string $path
     */
    public function addPath(string $namespace, ?string $path = null) : void;

    /**
     * Rend une vue
     * Le chemin peut être précisé avec des namespaces rajoutés vias addPath()
     * $this->render('@blog/show')
     * $this->render('view')
     *
     * @param string $view
     * @param array $params
     * @return string
     */
    public function render(string $view, array $params = null) : string;

    /**
     * Rajoute des variables globales à toutes mes vues
     *
     * @param string $key
     * @param mixed $value
     */
    public function addGlobal(string $key, $value) : void;
}