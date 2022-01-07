<?php require_once 'db-connection.php'; 
	
	// consulta simples pelo id
	//$query = 'select * from tb_usuarios where id = 6';

	// consulta limitada apenas um 1 registro de ordem decrescente
	$query = 'select * from tb_usuarios order by nome desc limit 0,1';

	$stmt = $conexao->query($query);


	$usuario = $stmt->fetch(PDO::FETCH_OBJ);

	echo '<pre>';
	print_r($usuario);
	echo '</pre>';
	
	//echo $usuario->senha;
	echo $usuario->email;
?>

<h3>Método fetch</h3>
<div class="text-justify">
<p>
	Neste caso, o retorno não será um array de objetos e sim apenas um objeto então a forma como acessamos os 
	valores também irá mudar
</p>
</div>
