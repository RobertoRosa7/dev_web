<?php
/*
* Middleware - Response & Database
* Tipos de respostas: Cabeçalho | JSON | Texto | XML
*
* Middleware adicionada camadas de código para aplicação, atua sobre a camada router
* são camadas que serão executadas antes das rotas - ex: autenticação antes de acessar
* rotas da API - method add() para adicionar midlleware
*
* Tem início conforme sua quantidade de camadas, case exista mais de uma será
* executada primeiro a última camada até chegar na aplicação, assim somente será
* terá acesso aplicação se passar pelas camadas milldlewares
*/
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
// instancia do slim com parâmetros para desenvolvimento
$app = new \Slim\App([
    'settings' => ['displayErrorDetails' => true]
]);

// Headers
$app->get('/header', function(Request $request, Response $response){
    // texto simples
   $response->write('este é um retorno header');
   // definir cabeçalho
   return $response->withHeader('allow','PUT')->withAddedHeader('Content-Length',10);
});
// JSON
$app->get('/json', function(Request $request, Response $response){
    return $response->withJson([
        'nome' => 'Roberto',
        'sobrenome' => 'Rosa',
        'email' => 'roberto.rosa7@gmail.com'
    ]);
});
// XML
$app->get('/xml', function(Request $request, Response $response){
    $xml = file_get_contents('arquivo.xml');
    $response->write($xml);
    // Content-Type: XML
    return $response->withHeader('Content-Type', 'application/xml');
});
// Middleware
$app->add(function($request, $response, $next){
    $response->write('<span style="color:blue">Middleware camada 1 </span>');
    // tratamento na saída da camada 1
    $response = $next($request, $response);
    // tratamento feito
    $response->write('<span style="color:salmon">Middleware fim da camada 1</span>');
    // permitindo acesso a rotas
    return $response;
});
$app->add(function($request, $response, $next){
    $response->write('<span style="color:red;">Middleware camada 2 </span>');
    return $next($request, $response);
});
$app->get('/users', function(Request $request, Response $response){
    $response->write('ação para usuários ');
});
$app->get('/posts', function(Request $request, Response $response){
    $response->write('ação para postagens ');
});
$app->run();