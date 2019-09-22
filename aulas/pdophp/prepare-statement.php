<h3>Prepare Statement</h3>
<div class="text-justify">
	<p>
		Deixando as aplicações mais seguras em relação a ataques de SQL Injection, a função prepare() irá fazer
		uma preparação, antes do PDOStatement enviar as query o será tratado com maior segurança
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
		O método prepare retorna um PDOStatement, a diferença é que o prepara não executa a query diretamente, 
		porque ele fica aguardando o tratamente da query, isto é, a aplicação de segurança sobre a query. E
		o responsável pela segurança é o &quot;bindValue&quot; que é executado a partir do encapsulamente em 
		uma variável do objeto conexão.
	</p>
	<p>
		Algo parecido com isso <br>
		<span class="bg-warning px-1">$stmt = $conexao->prepare($query);</span><br>
		<span class="bg-warning px-1">$stmt->bindValue(&quot;variável de ligação&quot;, &quot;valor de fato da ligação&quot;);</span>
	</p>
	<p>
		O valor submitido no segundo parâmetro do bindValue é vindo da super global POST, e no primeiro parâmetro
		é uma variável que ficou no lugar da super global POST, sendo substituída por (:variável).
		Portanto, o bindValue cria uma ligação para com a query definida pelo statement a partir de uma variável.
		Após terminar de fazer bindValue deve executar a método execute()
	
	</p>
	<p>
		O bindValue suportar ainda um terceiro parâmetro que pode extrair os tipos de dados inseridos no campos
		onde serão tratados, assim, se caso a senha conter somente números podemos usar PDO::PARAM_INT para poder
		extrair dados do tipo integer, (números)
	</p>
</div>
