<?php 
/*
* API - Application Programming Interface
* Referência: https://www.php-fig.org/
* PSR - PHP Standard Recommendation
* PHP-FIG - PHP Framework Interop Group
*
* Principais características: HTTP Router | PSR-7 | Middleware | Dependency Injection
*/
	require 'vendor/autoload.php';

$app = new \Slim\App;

// Definindo URL para passar informações as requisições que vierem
$app->get('/postagens/{ano}/{mes}',	function(){
	$mes = $request->getAttribute('mes');
	$ano = $request->getAttribute('ano');


	echo 'Lista de postagens: '.$mes;
	echo 'Lista de postagens: '.$ano;
});
// no local onde será indicando para requisição usar chaves, será considerado como placeholder, 
// onde poderá passar valores como id's - necessário definir um id após barra usuário
// para recuperar id passado pela URL é necessário usar parâmetro na função de callback
// nesta função de callback, será preciso passar dois parâmetros, uma para requisição e outro para responder
// uso do colchetes indica que placeholder é opcional
// uso de chaves indica que placeholder é obrigatório, assim qualquer requisição usando chaves deve ser
// tratada como private, todo o contéudo deve ficar dentro de colchetes para ser opcional
$app->get('/usuarios/{id}', function($request, $response){
	
	// fazer o retorno do request em uma variável e usar um método getAttribute passando um nome como param
	$id = $request->getAttribute('id');

	echo '{
		"Nome":"Roberto",
		"Sobrenome":"Rosa",
		"Profissão":"Desenvolvedor Web",
		"id":"25"
	}';
});
// pode ser usado expessão regular para fazer filtros na URL passado pelo parâmetros, isso deve
//ser feito após dois pontos
// (.) indica qualquer caracter - apenas nesta posição
// (*) indica qualquer caracter em mais de uma posição
$app->get('/lista/{itens:.*}',function($request, $response){

	$itens = $request->getAttribute('itens');

	print_r(explode('/', $itens));

});
// criando nomes para URL - assim podemos deixar mais amigável quando fizer requisições
// com o método setName() ao final a instrução de definir rotas podemos criar um apelido 
// para chamar essa rota através do nome configurado
$app->get('/blog/postagens/{id}', function($request, $response){
	$id = $request->getAttribute('id');
	echo 'Lista de postagens id: '.$id;
})->setName('blog');

// esta instrução abaixo trata da rota como apelido da instrução acima deixando o código mais
// fácil para acesso as requisições
$app->get('/meusite', function($request, $response){

	// está instrução recupera o mesmo caminho indicado pelo setName passando os paramêtros, 
	// podendo recuperar rota e também id's
	$retorno = $this->get('router')->pathFor('blog', ['id' => '5']);
	echo $retorno;
});
// para fazer agrupamentos de rotas, significa que podemos ter um diretório ou API com
// mais de uma versão e passar pela URL as versões que queremos alterar, assim evitamos ter
// que escrever repetições - para este tipo de rota não pode ter parâmetros de callback
$app->group('/v1', function(){

	$this->get('/usuarios', function(){
		echo 'Lista de usuários';

	});
	$this->get('/postagens', function(){
		echo 'Lista de Postagens';

	});
});
// após criação da URL e passar a função é preciso executar por meio do método run
$app->run();