<?php 

namespace A;
class Cliente implements CadastroInterface{
	public $nome = 'Roberto';

	public function __construct(){
		echo 'Exibir todas os métodos públicos e protegidos <br>';
		echo '<pre>';
		print_r(get_class_methods($this));
		echo '</pre>';
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
