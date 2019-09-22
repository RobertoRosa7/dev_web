<?php
/*
* Esses script php serão executados no contexto do diretório público, apesar desse script não estarem aqui
* neste diretório, porque no público está sendo requisitado.
*/
	// recuperar as classes
	require 'conexao.php';
	require 'tarefa.model.php';
	require 'tarefa.service.php';
	// verificando as variáveis GET com hardcode
	$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
	// verificação via GET se os parâmetros forem passados - por meio da variável ação
	if($acao == 'inserir'){
		// instanciando novo objeto tarefa
		$tarefa = new Tarefa();
		// recuperando valor do formulario e passado para o atributo da classe
		$tarefa->__set('tarefa', $_POST['tarefa']);
		// instanciando novo objeto de conexão
		$conexao = new Conexao();
		// instanciando novo objeto passando a conexão e a nova tarefa
		$tarefaService = new TarefaService($conexao, $tarefa);
		// inserindo nova tarefa no banco de dados
		$tarefaService->inserir();
		// redirecionamento após a inserção da nova tarefa
		header('Location: nova_tarefa.php?inclusao=1');
	}else if($acao == 'recuperar'){
		// criando nova instancia para recuperar todos os registros e atender aos parâmetros de TarefaService
		$tarefa = new Tarefa();
		$conexao = new Conexao();
		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefas = $tarefaService->recuperar();
		//echo 'Chegamos até aqui - recuperando registro';
	}else if($acao == 'atualizar'){
		// configurando os valores do formulário para objeto - para atualização
		$tarefa = new Tarefa();
		$tarefa->__set('id', $_POST['id']);
		$tarefa->__set('tarefa', $_POST['tarefa']);
		$conexao = new Conexao();
		$tarefaService = new TarefaService($conexao, $tarefa);
		//redirecionando se o retorno da atualização ser true
		if($tarefaService->atualizar()){
			if(isset($_GET['pag']) && $_GET['pag'] == 'index'){
				// se na URL estiver a variável pag e se for igual a index 
				header('Location: index.php');
			}else{
				// se na URL não estiver a variável pag
				header('Location: todas_tarefas.php');
			}
		}
	}else if($acao == 'remover'){
		// recuperando variável pela GET por meio da variável ação
		$tarefa  = new Tarefa();
		$tarefa->__set('id', $_GET['id']);
		$conexao = new Conexao();
		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->remover();
		if(isset($_GET['pag']) && $_GET['pag'] == 'index'){
			// se na URL estiver a variável pag e se for igual a index 
			header('Location: index.php');
		}else{
			// se na URL não estiver a variável pag
			header('Location: todas_tarefas.php');
		}
		//echo 'Estamos aqui';
	}else if($acao == 'marcarTarefa'){
		// recuperando variável pelo GET e configurando na classe
		$tarefa = new Tarefa();
		$tarefa->__set('id', $_GET['id']);
		$tarefa->__set('id_status', 2);
		$conexao = new Conexao();
		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->marcarTarefaRealizada();	
		if(isset($_GET['pag']) && $_GET['pag'] == 'index'){
			// se na URL estiver a variável pag e se for igual a index 
			header('Location: index.php');
		}else{
			// se na URL não estiver a variável pag
			header('Location: todas_tarefas.php');
		}	
	}else if($acao == 'recuperarPendentes'){
		$tarefa = new Tarefa();
		$tarefa->__set('id_status', 1);
		$conexao = new Conexao();
		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefas = $tarefaService->recuperarPendentes();
	}
