<?php 
	/*
	* variável acão deve vir antes do require para esta fique no escopo
	* toda a lógica dos métodos de inserir, atualizar, deletar e criar dependem de variável
	* porque é através dela que será realizado um redirecionamento para os métodos
	*/ 
	$acao = 'recuperar';
	// inclusão do script de controller
	require 'tarefa_controller.php';
?>
<html lang="pt-br">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Lista Tarefas</title>
		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<script>
			function editar(id, txt_tarefa){
				// criar um formulário de edição
				let form = document.createElement('form')
				form.action = 'tarefa_controller.php?acao=atualizar'
				form.method = 'post'
				form.enctype = 'form/data'
				form.className = 'row'

				// criar um input para entrada de textos
				let inputTarefa = document.createElement('input')
				inputTarefa.type = 'text'
				inputTarefa.name = 'tarefa'
				inputTarefa.className = 'form-control col-md-8 ml-2'
				inputTarefa.value = txt_tarefa

				// criar um input hidden para guarda o id da tarefa
				let inputID = document.createElement('input')
				inputID.type = 'hidden'
				inputID.name = 'id'
				inputID.value = id
				//inputID.id = id

				// criar um button par envio do form
				let buttonEditar = document.createElement('button')
				buttonEditar.type = 'submit'
				buttonEditar.className = 'btn btn-info col-md-3 ml-2'
				buttonEditar.innerHTML = 'Atualizar'

				// incluir inputTarefa no form
				form.appendChild(inputTarefa)

				// incluir inputID no form
				form.appendChild(inputID)

				// incluir button no form
				form.appendChild(buttonEditar)

				// selecionar a div tarefa
				let tarefa = document.getElementById(`tarefa_${id}`)
				
				// remover o texto da lista de tarefa para inclusão do formulário
				tarefa.innerHTML = ''
				
				/* incluir form na página - insertBefore permite inserir um elemento já renderizado
				* este método é nativo do DOM e espera dois parâmetro o primeiro qual que é a árvore de 
				* elemento selecionado - neste caso é o formulário (form). O segundo qual que é o nó de
				* elemento selecionado - neste caso o elemento tarefa não tem nenhum elemento filho, mas se
				* tivesse teria que dizer em qual elemento será adicioando. Será o primeiro elemento filho 
				* dentro de tarefa
				*/
				tarefa.insertBefore(form, tarefa[0])
				//Debug
				//alert(txt_tarefa)
			}
			function remover(id){
				// recuperar URL com parâmetro remover mais id
				window.location.href = `todas_tarefas.php?acao=remover&id=${id}`
			}
			function marcarTarefaRealizada(id){
				window.location.href = `todas_tarefas.php?acao=marcarTarefa&id=${id}`
			}
		</script>
	</head>
	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					App Lista Tarefas
				</a>
			</div>
		</nav>
		<div class="container app">
			<div class="row">
				<div class="col-sm-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php">Tarefas pendentes</a></li>
						<li class="list-group-item"><a href="nova_tarefa.php">Nova tarefa</a></li>
						<li class="list-group-item active"><a href="#">Todas tarefas</a></li>
					</ul>
				</div>
				<div class="col-sm-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Todas tarefas</h4>
								<hr />
								<!-- listando todas as tarefas do registro -->
								<? foreach($tarefas as $indices => $tarefa) {?>
									<div class="row mb-3 d-flex align-items-center tarefa">
										<div class="col-sm-9" id="tarefa_<?= $tarefa->id ?>">
											<?= $tarefa->tarefa ?> (<?= $tarefa->status ?>)
										</div>
										<div class="col-sm-3 mt-2 d-flex justify-content-between">
											<i class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?= $tarefa->id ?>)"></i>
											<!-- exibindo os botões somente se status for pendente -->
											<? if($tarefa->status == 'pendente') {?>
											<i class="fas fa-edit fa-lg text-info" onclick="editar(<?= $tarefa->id ?>, '<?= $tarefa->tarefa ?>')"></i>
											<i class="fas fa-check-square fa-lg text-success" onclick="marcarTarefaRealizada(<?= $tarefa->id ?>)"></i>
											<? }?>
										</div>
									</div>
								<? } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>