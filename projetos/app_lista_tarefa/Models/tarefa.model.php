<?php 

class Tarefa{
	// atributos são semelhantes as colunas do banco de dados
	private $id;
	private $id_status;
	private $tarefa;
	private $data_cadastro;

	public function __get($attr){
		return $this->$attr;
	}
	public function __set($attr, $value){
		$this->$attr = $value;
	}
}