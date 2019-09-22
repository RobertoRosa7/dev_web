<?php 

# Class dashboard
class Dashboard {
	public $data_inicio;
	public $data_fim;
	public $numeroVendas;
	public $totalVendas;
	public $clientesAtivos;
	public $clientesInativos;
	public $totalReclamacoes;
	public $totalElogios;
	public $totalSugestoes;
	public $totalDespesas;

	public function __get($attr){
		return $this->$attr;
	}
	public function __set($attr, $value){
		$this->$attr = $value;
		return $this;
	}
}

class Conexao {
	private $host = 'localhost';
	private $dbname = 'dashboard';
	private $user = 'kakashi';
	private $pass = '123765';

	public function conectar(){
		try{
			$conexao = new PDO("mysql:host=$this->host;dbname=$this->dbname", "$this->user", "$this->pass");

			// fazendo a instancia da conexão trabalhe com uft8
			$conexao->exec('set charset set utf8');

			return $conexao;
		
		}catch(PDOException $e){
			echo '<p>'.$e->getMessage().'</p>';
		}
	}
}

class Bd {
	private $conexao;
	private $dashboard;

	// parâmetro baseado na respectiva classe
	public function __construct(Conexao $conexao, Dashboard $dashboard){
		// link para conexão
		$this->conexao = $conexao->conectar();
		$this->dashboard = $dashboard;
	}
	public function getNumeroVendas(){
		$query = '
			select 
				count(*) as numero_vendas
			from
				tb_vendas
			where
				data_vendas
			between
				:data_inicio
			and
				:data_fim

		';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':data_inicio', $this->dashboard->__get('data_inicio'));
		$stmt->bindValue(':data_fim', $this->dashboard->__get('data_fim'));
		$stmt->execute();

		/*
		* retorna um objeto que será passo o valor retornado para um atributo criado agora, retorn somente
		* o valor, não objeto
		*/
		return $stmt->fetch(PDO::FETCH_OBJ)->numero_vendas;
	}
	public function getTotalVendas(){
		$query = '
			select 
				sum(total_vendas) as total_vendas
			from
				tb_vendas
			where
				data_vendas
			between
				:data_inicio
			and
				:data_fim

		';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':data_inicio', $this->dashboard->__get('data_inicio'));
		$stmt->bindValue(':data_fim', $this->dashboard->__get('data_fim'));
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_OBJ)->total_vendas;
	}
	public function getClientesAtivos(){
		$query = '
			select
				count(cliente_ativo) as total_clientes_ativos
			from
				tb_clientes
			where
				cliente_ativo = 1
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ)->total_clientes_ativos;
	}
	public function getClientesInativos(){
		$query = '
			select
				count(cliente_ativo) as total_clientes_inativos
			from
				tb_clientes
			where
				cliente_ativo = 0
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ)->total_clientes_inativos;
	}
	public function getReclamacoes(){
		$query = '
			select
				count(*) as total_reclamacoes
			from
				tb_reclamacoes
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ)->total_reclamacoes;
	}
	public function getTotalElogios(){
		$query = '
			select
				count(*) as total_elogios
			from
				tb_elogios
			where gostei = 1
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ)->total_elogios;
	}
	public function getTotalSugestoes(){
		$query = '
			select
				count(*) as total_sugestoes
			from
				tb_sugestoes
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ)->total_sugestoes;
	}
	public function getTotalDespesas(){
		$query = '
			select
				sum(total_despesa) as total_despesas
			from
				tb_despesas
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ)->total_despesas;
	}
}
$dashboard = new Dashboard();
$conexao = new Conexao();

$competencia = explode('-', $_GET['competencia']);
$ano = $competencia[0];
$mes = $competencia[1];

$dias_do_mes = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);

$dashboard->__set('data_inicio', $ano.'-'.$mes.'-01');
$dashboard->__set('data_fim', $ano.'-'.$mes.'-'.$dias_do_mes);

$db = new Bd($conexao, $dashboard);

// passar o valor consultado na banco de dados para o atributo do dashboard numero de vendas
$dashboard->__set('numeroVendas', $db->getNumeroVendas());
$dashboard->__set('totalVendas', $db->getTotalVendas());
$dashboard->__set('clientesAtivos', $db->getClientesAtivos());
$dashboard->__set('clientesInativos', $db->getClientesInativos());
$dashboard->__set('totalReclamacoes', $db->getReclamacoes());
$dashboard->__set('totalElogios', $db->getTotalElogios());
$dashboard->__set('totalSugestoes', $db->getTotalSugestoes());
$dashboard->__set('totalDespesas', $db->getTotalDespesas());
// convertendo objeto para json
echo json_encode($dashboard);
#print_r($ano.'/'.$mes.'/'.$dias_do_mes);