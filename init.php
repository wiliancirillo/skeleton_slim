<?php

use Slim\Factory\AppFactory;

require "vendor/autoload.php";

$app = AppFactory::create();

// Add Error Handling Middleware
$app->addErrorMiddleware(true, true, true);

// Carrega as rotas
require "config/routes.php";
