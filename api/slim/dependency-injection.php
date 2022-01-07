<?php
/*
* Dependency Injection
*
* Para utilizar os serviços de injeção é preciso criar um classe
* externa e usar dentro da rota de serviços.
*
* Referência: https://pimple.symfony.com/
* para injeção de conteúdo
*/
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
// instancia do slim com parâmetros para desenvolvimento
$app = new \Slim\App([
    'settings' => ['displayErrorDetails' => true]
]);

// Container Dependency Injection
class Server {

}
# $server = new Server;
// Container Pimple
$container = $app->getContainer();
// fazendo a instancia da classe dentro do container pimple
$container['server'] = function(){
    return new Server;
};
// server router - use(name_classe) após declaração dos parâmetros, antes do bloco de code
$app->get('/server', function(Request $request, Response $response){
    // recuperar o serviço object
    $server = $this->get('server');
    print_r($server);

    // aqui podemos usar $this para acessar recursos do container e slim
});
// controller servers
$app->get('/user','\MyApp\Controllers\Home:index');
// instancia da classe view dentro da class home usando injection
$container = $app->getContainer();
$container['Home'] = function(){
    return new MyApp\Controllers\Home(new MyApp\View);
};
$app->get('/view', 'Home:index');
$app->run();