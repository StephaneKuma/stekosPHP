<?php

use App\Blog\BlogModule;
use Core\App;
use Core\Renderer\RendererInterface;
use Core\Renderer\TwigRenderer;
use DI\ContainerBuilder;
use Dotenv\Dotenv;
use GuzzleHttp\Psr7\ServerRequest;
use function Http\Response\send;

require "../vendor/autoload.php";

$dotenv = Dotenv::create(dirname(__DIR__));
$dotenv->load();
$dotenv->required('APP_ENV')->allowedValues(['production', 'development']);

if (getenv('APP_ENV') === "development") {
    $whoops = new Whoops\Run;
    $whoops->prependHandler(new Whoops\Handler\PrettyPageHandler);
    $whoops->register();
}

$modules = [
    BlogModule::class
];

$builder = new ContainerBuilder();
$builder->addDefinitions(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php');
foreach ($modules as $module) {
    if ($module::DEFINITIONS) {
        $builder->addDefinitions($module::DEFINITIONS);
    }
}
$container = $builder->build();



$app = App::getInstance($container, $modules);

$response = $app->run(ServerRequest::fromGlobals());

send($response);