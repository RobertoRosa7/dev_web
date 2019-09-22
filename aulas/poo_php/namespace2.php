<?php 
/*
* NameSpace: utilizando namespace para classes e interfaces
* Permite o agrupamente de classes, interfaces e constantes, assim como funções especiais
*
* Hoje a maioria dos recursos que utilizamos no dia a dia já está pronto, na forma de biblioteca feito
* por programadores ou instituições, até mesmo por empresas e disponível em comunidades ou fóruns.
*
* Caso faça a implementação de bibliotecas externas pode haver conflitos de declarações, devido ao fato
* de serem incorporadas ao código, para solucionar possíveis conflitos existe os "NameSpace"
*
* Neste caso seguindo a ordem de precedência o objeto que será instanciado será o último, portanto, será o que
* tem namespace B, para indicar qual classe queremos instanciar devemos no momento de fazer sua instanciação dizer
* que está classe usando barra invertida (\nome_do_namespace\nome_da_classe)
* 
* O namespace faz uma camada para separar os códigos tornando-os individuais para ses namespace, também pode ser
* feito a implementação de classes e interfaces de outros namespace para compartilhar ou herdar seus valores e
* métodos, bastando colacar \nome_do_namespace\class ou interface{}
* 
*/
namespace A;
class Cliente implements \B\CadastroInterface{
	public $nome = 'Roberto';

	public function __construct(){
		/*
		echo 'Exibir todas os métodos públicos e protegidos <br>';
		echo '<pre>';
		print_r(get_class_methods($this));
		echo '</pre>';
		*/
	}

	public function __get($attr){
		return $this->$attr;
	}
	public function salvar(){
		echo 'salvar';
	}
	public function remover(){
		echo 'remover';
	}
}
interface CadastroInterface{
	public function salvar();
}


namespace B;
class Cliente implements \A\CadastroInterface{
	public $nome = 'Paulo';
	
	public function __construct(){
		echo 'Exibir todas os métodos públicos e protegidos <br>';
		echo '<pre>';
		print_r(get_class_methods($this));
		echo '</pre>';
	}

	public function __get($attr){
		return $this->$attr;
	}
	public function remover(){
		echo 'remover';
	}
	public function salvar(){
		echo 'salvar';
	}
}
interface CadastroInterface{
	public function remover();
}
/*
* Este site https://packagist.org/ contem diversas bibliotecas que podemos usar no nosso código, para usar deve
* ser através do composer, uma espécie de compilador framework para PHP
* 
* Bibliotecas:
* Slim | Laravel | phpmailer | doctrine | oauth | charts | thumbnails
* 
*/