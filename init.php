<?php

/*
\ * Path: /init.php
\ * Boostrap of the project
\ */

use Slim\Factory\AppFactory;
use Illuminate\Database\Capsule\Manager as Capsule;

require 'vendor/autoload.php';

// Carregar variáveis de ambiente
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$app = AppFactory::create();
// Add Error Handling Middleware
$app->addErrorMiddleware(true, true, true);

// Carrega todos os arquivos de inicialização
$initializersPath = __DIR__ . '/config/initializers/';
if (is_dir($initializersPath)) {
    $initializerFiles = new DirectoryIterator($initializersPath);
    foreach ($initializerFiles as $file) {
        if ($file->isFile() && $file->getExtension() === 'php') {
            require_once $file->getPathname();
        }
    }
}

// Inicia o Eloquent ORM
$config = require 'config/database.php';
//$capsule = new Capsule();
//$capsule->addConnection($config);
//$capsule->setAsGlobal();
//$capsule->bootEloquent();

// Carrega as rotas
require 'config/routes.php';
