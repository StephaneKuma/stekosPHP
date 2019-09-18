<?php


namespace App\Blog\Controllers;


use Core\Renderer\RendererInterface;
use Psr\Http\Message\ServerRequestInterface as Request;

class BlogController
{
    /**
     * @var RendererInterface
     */
    private $renderer;

    /**
     * BlogController constructor.
     * @param RendererInterface $renderer
     */
    public function __construct(RendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }

    public function __invoke(Request $request)
    {
        $slug = $request->getAttribute('slug');

        if ($slug) {
            return $this->show($slug);
        }

        return $this->index();
    }

    public function index() : string
    {
        return $this->renderer->render('@blog/index');
    }

    public function show(string $slug) : string
    {
        return $this->renderer->render('@blog/show', compact('slug'));
    }
}