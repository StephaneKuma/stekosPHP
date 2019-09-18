<?php


namespace Core\Router;


class Route
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var callable
     */
    private $callable;

    /**
     * @var array
     */
    private $parameters;

    /**
     * Route constructor.
     * @param string $name
     * @param string|callable $callable
     * @param array $parameters
     */
    public function __construct(string $name, $callable, array $parameters)
    {
        $this->name = $name;
        $this->callable = $callable;
        $this->parameters = $parameters;
    }

    /***
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /***
     * @return string|callable
     */
    public function getCallable()
    {
        return $this->callable;
    }

    /***
     * Retrieve the url parameters
     *
     * @return string[]
     */
    public function getParams() :array
    {
        return $this->parameters;
    }
}