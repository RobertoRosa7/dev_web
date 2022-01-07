<?php
	$user = 'kakashi';
	$senha = '123765';
	$dsn = 'mysql:host=localhost;dbname=php_com_pdo';

	// $conexao = new PDO('mysql:host=localhost;dbname=php_com_pdo', 'kakashi', '123765');

	try{

		$conexao = new PDO($dsn, $user, $senha);

	}catch(PDOException $e){
		echo 'Erro: '.$e->getcode().' Mensagem: '.$e->getMessage();
		// aqui vai uma logica para tratar os erros e poder armazenar
	}
?>

<h3>Tratando possíveis erros</h3>
<div class="text-justify">
	<p>
		O PDOException é responsável por tratar de erros de conexões com banco de dados, assim a aplicação não 
		deixa de funcionar, então para fazer isso devemos usar a instrução try{}catch{}
	</p>
</div>
