<?php 

class Conexao {
	private $host = 'localhost';
	private $dbname = 'php_com_pdo';
	private $user = 'kakashi';
	private $pass = '123765';

	public function conectar(){
		try{
			$conexao = new PDO("mysql:host=$this->host;dbname=$this->dbname","$this->user","$this->pass");
			return $conexao;
		}catch(PDOException $e){
			echo '<p>'.$e->getMessage().'</p>';
		}
	}
}