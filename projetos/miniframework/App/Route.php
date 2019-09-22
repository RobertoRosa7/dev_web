<?php 
/*
* Primeira coisa é estabelecer o namespace 
* Especificação PSR-4 - um script dentro de um diretório esteja em um namespace compativel com o diretório
*/
namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap{

	protected function initRoutes(){
		// acionar indexController
		$routes['home'] = array(
			'route' => '/',
			'controller' => 'indexController',
			'action' => 'index'
		);
	
		$routes['sobre_nos'] = array(
			'route' => '/sobre_nos',
			'controller' => 'indexController',
			'action' => 'sobreNos'
		);
	
		// configura o array para tomada de decisão na contrução do objeto		
		$this->setRoutes($routes);
	}
}