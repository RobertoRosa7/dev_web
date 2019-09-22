<?php
/*
* Tipos de requisição ou Verbos Http
*
* GET | POST | DELETE | PUT | 
*
* GET -> recuperar recursos do Servidor (select)
* POST -> criar dados no servidor (insert)
* PUT -> atualizar dados no servidor (update)
* DELETE -> excluir dados no servidor (delete)
*/
// usando namespace PSR - Interface para definição de tip
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;
// rota para requisições de consulta ou qualquer lista
$app->get('/posts', function(Request $request, Response $response){
    // Padrão psr7 - retorno para usuário escrendo no corpo da mensagem
    $response->getBody()->write('Lista de Postagens');

    // return - porque trata-se de uma função anônima
    return $response;
});
// rota para requisições de inserir dados 
$app->post('/user/add', function(Request $request, Response $response){
    // recupear dados POST ($_POST)
    $post = $request->getParsedBody();
    // show return 
    return $response->getBody()->write($post['name']);
    //return $post;
});
// rota para requisições de atualização de dados
$app->put('/user/update', function(Request $request, Response $response){
    $post  = $request->getParsedBody();
    $id    = $post['id'];
    $name  = $post['name'];
    $email = $post['email'];

    return $response->getBody()->write('sucesso ao atualizar: '.$id);
});
// rota para requisições de remoção de dados
$app->delete('/user/remove/{id}', function(Request $request, Response $response){

    $id = $request->getAttribute('id');

    return $response->getBody()->write('sucesso ao deletar: ' . $id);

});
// run - indica a execução dos códigos
$app->run();