<?php 

namespace App\Controllers;

# Recursos 
use MF\Controller\Action;
use MF\Model\Container;

# Models
//use App\Connection;
use App\Models\Produto;
use App\Models\Info;

class IndexController extends Action{

	public function index(){
		// $this->view->dados = ['sofa', 'cadeira', 'cama'];
		// instancia de conexao
		// $conn =	Connection::getDb();
		// instanciar o modelo produto
		// $produto = new Produto($conn);
		// pegando produtos no banco de dados
		
		// instanciando a classe produto por meio da classe model
		$produto = Container::getModel('Produto');

		// recuperando dados do banco de dados
		$produtos = $produto->getProdutos();

		// imprimindo para usuário na página de conteúdo - NÃO LAYOUT
		$this->view->dados = $produtos;
		
		// carrega página
		$this->render('index', 'layout1');
	}
	public function sobreNos(){
		// instanciando uma conexão com banco de dados
		// $conn = Connection::getDb();
		// instanciando um novo objeto info passando a conexão
		// $info = new Info($conn);
		// recuperando dados do banco de dados
		
		// instanciando a classe info por meio da classe model
		$info = Container::getModel('Info');

		// recuperando dados do banco de dados
		$infos = $info->getInfo();	

		// imprimindo info para usuário na página de conteúdo - NÃO LAYOUT
		$this->view->dados = $infos;

		// recuperando página da URL e forçando um página de layout
		$this->render('sobreNos', 'layout1');
	}
}