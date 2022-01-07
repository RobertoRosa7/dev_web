<?php
	$user = 'kakashi';
	$senha = '123765';
	$dsn = 'mysql:host=localhost;dbname=php_com_pdo';

	// $conexao = new PDO('mysql:host=localhost;dbname=php_com_pdo', 'kakashi', '123765');

	try{
		// conexão com banco de dados
		$conexao = new PDO($dsn, $user, $senha);

		// criando uma nova tabela no banco de dados
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
?>

<h3>Instruções SQL</h3>
<div class="text-justify">
	<p>
		Com Exec do PDO podemos manipular dados do banco de dados, como criar tabelas e adicionar registros. O 
		método exec() espera uma query como parâmetro - <span class="bg-warning px-1">$conexao->exec($query)</span>
	</p>
	<p>
		O método exec() tem um retorn de zero para DDL (Data Definition Language), assim neste caso como não há
		alteração no banco de dados e sim definição seu retorno é zero 
	</p>
	<p>
		Case seja uma inserção de dados então o exec() irá retorna um (1) e sempre que atualizar a página será 
		registrado um novo registro no banco de dados do MySQL.
	</p>
</div>
