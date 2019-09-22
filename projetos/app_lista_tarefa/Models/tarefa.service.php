<?php 

// CRUD
class TarefaService{
	private $conexao;
	private $tarefa;

	// tipagem do parêmetro recebido
	public function __construct(Conexao $conexao, Tarefa $tarefa){
		// exceutando um método por meio da variável vindo através de param
		$this->conexao = $conexao->conectar();
		$this->tarefa = $tarefa;
	}
	//create
	public function inserir(){
		// query de inserção
		$query = 'insert into tb_tarefas(tarefa)values(:tarefa)';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
		$stmt->execute();
	}	
	// read
	public function recuperar(){
		// query de consulta
		$query = '
			select 
				t.id, s.status, t.tarefa 
			from 
				tb_tarefas as t left join tb_status as s on (t.id_status = s.id)
			order by 
				t.tarefa desc
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
	// update
	public function atualizar(){
		// query de atualização
		//$query = "update tb_tarefas set tarefa = :tarefa where id = :id";
		$query = "update tb_tarefas set tarefa = ? where id = ?";
		$stmt = $this->conexao->prepare($query);
		//$stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
		//$stmt->bindValue(':id', $this->tarefa->__get('id'));
		$stmt->bindValue(1, $this->tarefa->__get('tarefa'));
		$stmt->bindValue(2, $this->tarefa->__get('id'));
		return $stmt->execute();

		//print_r($this->tarefa);
	}
	// delete
	public function remover(){
		// query de remoção de registros na tabela
		$query = "delete from tb_tarefas where id = ?";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, $this->tarefa->__get('id'));
		return $stmt->execute();
	}
	public function marcarTarefaRealizada(){
		// query de marcar tarefa realizada
		$query = "update tb_tarefas set id_status = ? where id = ?";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, $this->tarefa->__get('id_status'));
		$stmt->bindValue(2, $this->tarefa->__get('id'));
		return $stmt->execute();
	}
	public function recuperarPendentes(){
		$query = '
			select 
				t.id, s.status, t.tarefa 
			from 
				tb_tarefas as t left join tb_status as s on (t.id_status = s.id)
			where t.id_status = :id_status
			order by 
				t.tarefa desc
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id_status', $this->tarefa->__get('id_status'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
}