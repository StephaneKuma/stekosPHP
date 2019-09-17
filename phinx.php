<?php

use App\Helpers\Config;

try {
    $pdo = new PDO(
        "mysql:host=" . Config::get("DB_HOST") . ";port=" . (int)Config::get("DB_PORT") . ";dbname=" . Config::get("DB_DATABASE"),
        Config::get("DB_USERNAME"),
        Config::get("DB_PASSWORD"),
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    );
} catch (Exception $e) {
    echo "Erreur: " . $e->getMessage() . "<br/>";
    echo "N°: " . $e->getCode();
}

$env = Config::get("APP_ENV");

return [
    'paths' => [
        'migrations' => __DIR__ . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'migrations',
        'seeds' => __DIR__ . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'seeds'
    ],
    'environments' => [
        'default_database' => 'development',
        'development' => [
            'name' => 'stekosphp',
            'connection' => $pdo
        ]
    ]
];

