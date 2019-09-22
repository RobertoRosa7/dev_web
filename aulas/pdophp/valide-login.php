<?php

	if(!empty($_POST['email']) && !empty($_POST['senha'])){

		try{
			$conexao = new PDO('mysql:host=localhost;dbname=php_com_pdo', 'kakashi', '123765');

			// query - uso de chaves para resolver problemas com apas simples e dupas
			$query = "select * from tb_usuarios where ";
			$query .= " email = :email ";
			$query .= " and senha = :senha ";

			// executando o método prepare - retorna um PDOStatement
			$stmt = $conexao->prepare($query);
			$stmt->bindValue(':email', $_POST['email']);
			$stmt->bindValue(':senha', $_POST['senha'], PDO::PARAM_INT);

			$stmt->execute();

			$usuario = $stmt->fetch(PDO::FETCH_OBJ);
			echo '<pre>';
			print_r($usuario);
			echo '</pre>';

		}catch(PDOException $e){
			echo 'Erro: '.$e->getcode().' Mensagem: '.$e->getMessage();
		}
	}

?>
<a href="index.php" class="btn btn-light">Voltar</a>