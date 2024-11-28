<?php

require __DIR__ . '/vendor/autoload.php';

use Demovendor\DemoPackage\DemoPackage;

$configGenerator = new DemoPackage(__DIR__ . '/generated-config.php');

$customConfig = [
    'database' => [
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'test_db',
    ],
    'app_name' => 'My Application',
];

$configGenerator->generate($customConfig);

echo "Configuration file generated successfully!\n";
