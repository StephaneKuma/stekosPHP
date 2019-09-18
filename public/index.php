<?php

use App\Blog\BlogModule;
use Core\App;
use Core\Renderer\TwigRenderer;
use Dotenv\Dotenv;
use GuzzleHttp\Psr7\ServerRequest;
use function Http\Response\send;

require "../vendor/autoload.php";
define('VIEW_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR);

$dotenv = Dotenv::create(dirname(__DIR__));
$dotenv->load();
$dotenv->required('APP_ENV')->allowedValues(['production', 'development']);

if (getenv('APP_ENV') === "development") {
    $whoops = new Whoops\Run;
    $whoops->prependHandler(new Whoops\Handler\PrettyPageHandler);
    $whoops->register();
}

$renderer = new TwigRenderer(VIEW_PATH);

$modules = [
    BlogModule::class
];

$app = App::getInstance($modules, compact('renderer'));

$response = $app->run(ServerRequest::fromGlobals());

send($response);