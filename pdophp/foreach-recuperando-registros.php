<?php require_once 'db-connection.php'; 
	
	// consulta simples pelo id
	$query = 'select * from tb_usuarios';

	// consulta limitada apenas um 1 registro de ordem decrescente
	//$query = 'select * from tb_usuarios order by nome desc limit 0,1';

	//$stmt = $conexao->query($query);
	//$lista_usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
	/*
	// percorrendo usando foreach, key e value
	foreach($lista_usuarios as $key => $value){
		// $kay significa os índices que são associados => aos seus respectivos valores
		//print_r($value);

		// acessandos os valores
		//echo $value['nome'];
		echo $value['email'];
		echo '<hr>';
	}
	*/

	// outro jeito de fazer a consulta - maio mais rápido
	foreach($conexao->query($query) as $indices => $valores){
		print_r($valores);
		echo '<hr>';
	}
?>

<h3>Foreach Recuperando registros</h3>
<div class="text-justify">

</div>
