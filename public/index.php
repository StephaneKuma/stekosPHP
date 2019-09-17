<?php

use App\Helpers\Config;
use Core\Router;
use Dotenv\Dotenv;

require "../vendor/autoload.php";

$dotenv = Dotenv::create(dirname(__DIR__));
$dotenv->load();
$dotenv->required('APP_ENV')->allowedValues(['production', 'development']);

if (getenv('APP_ENV') === "development") {
    $whoops = new Whoops\Run;
    $whoops->prependHandler(new Whoops\Handler\PrettyPageHandler);
    $whoops->register();
}

//$dotenv->required('DB_DATABASE')->notEmpty();
//
//dump(Config::get("DB_USERNAME"));
//dump(Config::get("DB_PASSWORD"));
//
//try {
//    $pdo = new PDO(
//        "mysql:host=" . Config::get("DB_HOST") . ";port=" . (int)Config::get("DB_PORT") . ";dbname=" . Config::get("DB_DATABASE"),
//        Config::get("DB_USERNAME"),
//        Config::get("DB_PASSWORD"),
//        [
//            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
//        ]
//    );
//} catch (Exception $e) {
//    echo "Erreur: " . $e->getMessage() . "<br/>";
//    echo "N°: " . $e->getCode();
//}
//
//
//dump($pdo->query("SELECT * FROM users WHERE 1")->fetchAll());
//dd($_SERVER);

$router = new Router(dirname(__DIR__) . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR);

$router
    ->get('/', 'post.index', 'home')
    ->get('/post', 'post.index', 'post.index')
    ->run();