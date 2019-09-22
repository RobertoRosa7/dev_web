<?php
/*
* Database:
* Illuminate Database:
* Ferramenta para utilização de banco de dados - utlizada junto com Laravel
*/
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Database\Capsule\Manager as Capsule;

require 'vendor/autoload.php';
// instancia do slim com parâmetros para desenvolvimento
$app = new \Slim\App([
    'settings' => ['displayErrorDetails' => true]
]);