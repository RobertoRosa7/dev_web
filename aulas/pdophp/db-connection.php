<?php
	$user = 'kakashi';
	$senha = '123765';
	$dsn = 'mysql:host=localhost;dbname=php_com_pdo';

	// $conexao = new PDO('mysql:host=localhost;dbname=php_com_pdo', 'kakashi', '123765');

	try{
		// conexão com banco de dados
		$conexao = new PDO($dsn, $user, $senha);

		/* criando uma nova tabela no banco de dados
		$query = '
			create table tb_usuarios(
				id int not null primary key auto_increment,
				nome varchar(50) not null,
				email varchar(100) not null,
				senha varchar(32) not null
			)
		';
		// retorno 0
		$retorno = $conexao->exec($query);
		*/
		/* inserindo dados na tabela
		$query = '
			insert into tb_usuarios(nome,email,senha)
			values("kakashi kisura", "kakashi.kisura7@gmail.com", "1234"
			)
		';
		*/
		// deletando todos os registro da tabela
		// $query = 'delete from tb_usuarios';

	}catch(PDOException $e){
		echo 'Erro: '.$e->getcode().' Mensagem: '.$e->getMessage();
		// aqui vai uma logica para tratar os erros e poder armazenar
	}