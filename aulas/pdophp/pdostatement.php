<?php require_once 'db-connection.php'; 
	
	// realizando uma consulta
	$query = 'select * from tb_usuarios';

	$stmt = $conexao->query($query);
	
	// recupera todos os registro 
	//$lista = $stmt->fetchAll();

	// realizando filtro na recuperação dos registros - somente associativos
	//$lista = $stmt->fetchAll(PDO::FETCH_ASSOC);

	// somente numeros - ou sequenciais
	//$lista = $stmt->fetchAll(PDO::FETCH_NUM);

	// ambos
	//$lista = $stmt->fetchAll(PDO::FETCH_BOTH);

	// array de objetos e não array de array
	$lista = $stmt->fetchAll(PDO::FETCH_OBJ);



	echo '<pre>';
	print_r($lista);
	echo '</pre>';

	// acessando valores como array
	//echo $lista[0]['email'];
	//echo $lista[0]['email'];
	//echo $lista[1]['senha'];

	// acessando valores como objeto
	//echo $lista[0]->senha;
	echo $lista[1]->nome;
?>

<h3>PDO Statement Object (Query) com fetchAll</h3>
<div class="text-justify">
<p>
	Objeto que será responsável pelo retorno dos valores do banco de dados - fetchAll() retorna todos os registros
	da consulta
</p>
<p>
	cada registro contido no banco de dados será um array, que por sua vez terá em cada registros os valores
	assim, será um array de array, ou array multidimensional.
</p>
<p>
	Cada índice receberá os nomes das colunas contido na tabela de forma associativa, mas também podemos recuperar
	de forma sequencial.
</p>
</div>
