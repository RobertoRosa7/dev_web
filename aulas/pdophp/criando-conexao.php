<?php
	$user = 'kakashi';
	$senha = '123765';
	$dsn = 'mysql:host=localhost;dbname=php_com_pdo';

	$conexao = new PDO($dsn, $user, $senha);
	// $conexao = new PDO('mysql:host=localhost;dbname=php_com_pdo', 'kakashi', '123765')
?>

<h3>Criando conexão com MySQL</h3>
<div class="text-justify">
	<p>
		Primeiro passo é criar uma intancia do PDO, <span class="bg-warning px-1">$conexao = new PDO();<span>
	</p>
	<p>
		O primeiro parâmetro que precisa passar na instancia do objeto é <span class="bg-warning px-1">Data Source Name (DSN)</span><br>
		que significa nome da fonte de dados, em seguida passar o <span class="bg-warning px-1">host=localhost</span>
	</p>
	<p>
		O segundo parâmetro é nome de <span class="bg-warning px-1">usuário</span> do banco de dados e o terceiro é a <span class="bg-warning px-1">senha</span>
	</p>
</div>
