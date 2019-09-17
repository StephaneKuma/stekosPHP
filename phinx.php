<?php
$pdo = new PDO(
    'mysql:dbname=stekosPHP',
    'root',
    '',
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
);

return [
    'paths' => [
        'migrations' => __DIR__ . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'migrations',
        'seeds' => __DIR__ . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'seeds'
    ],
    'environments' => [
        'default_database' => 'development',
        'development' => [
            'name' => 'stekosPHP',
            'connection' => $pdo
        ]
    ]
];