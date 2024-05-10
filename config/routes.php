<?php

// Homepage
$app->get('/', function ($request, $response, $args) {
  $response->getBody()->write("Home");
  return $response;
});

// Adicione mais rotas aqui conforme necessário
