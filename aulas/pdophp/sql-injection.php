<?php
require_once 'db-connection.php'; 
	$query = 'select * from tb_usuarios';
	foreach($conexao->query($query) as $indices => $valores){
	}
?>

<h3>SQL Injection</h3>
<div class="text-justify">
	<p>
		SQL Injection é a injeção de intruções SQL (Strutured Query Language) através de URL ou campos de entrada
		que visa a manipulação de registros no banco de dados.
	</p>
	<form action="valide-login.php" method="post">
		<div class="row">
			<div class="col-md-6">
				<input name="email" type="text" class="form-control" placeholder="E-mail">
			</div>
			<div class="col-md-6">
				<input name="senha" type="password" class="form-control" placeholder="senha">
			</div>
		</div>
		<div class="row my-3">
			<div class="col-md-3">
				<input type="submit" value="enviar" class="btn btn-block btn-md btn-warning">
			</div>
		</div>
	</form>
	<p>
		SQL Injection pode causar sérios problemas para a aplicação, pois um usuário mal intencionado pode deletar
		todos os registros com apenas um comando dentro de formulários
	</p>
</div>
