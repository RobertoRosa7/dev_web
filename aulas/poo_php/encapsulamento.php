<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Curso - POO - PHP</title>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    
  </head>
  <body class="bg-dark">
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-8 bg-light">
          <h1 class="text-center text-primary">Painel de exercícios de POO - PHP</h1>
          <h5>Pilar Encapsulamento</h5>
        <?php 
        /*
        * Encapsulamento: public | protected | private
		*
        * Operadores de visibilidades:
        * public: indica que todos tem acesso
        * protected: indica que a classe e seus filhos tem acesso - não estão disponiveis para aplicação
        * private: somente a classe tem acesso - não estão disponiveis para aplicação
		*
		* Interface: significa acessar os atributos private e protected por meio de funções public - assim
		* poderá ser feita modificações pela aplicação
		*
		* Métodos: para acessar métodos private e protected por meio da aplicação é necessário o uso de uma
		* interface, isto é, por meio de uma função public fazer a chamada dos métodos private e protected
		*
		* Herança: private não é passado para os filhos, portanto, as subclasses não receberam os atributos
		* da superclasse
        */
        # MODELO QUE REPRESENTA ABSTRAÇÃO PAI
        class Pai{
        	private $nome = 'Roberto';
        	protected $sobrenome = 'Rosa';
        	public $humor = 'Feliz';

        	public function __get($attr){
        		return $this->$attr;
        	}
        	public function __set($attr, $value){
        		if(strlen($value) >= 3){
        			$this->$attr = $value;
        		}
        	}
        	private function executarMania(){
        		echo 'Assobiar!';
        	}
        	protected function responder(){
        		echo 'Oi!';
        	}
        	# INTERFACE PARA ACESSO AOS MÉTODOS
        	public function executarAction(){

        		# LÓGICA SIMPLES - EXIBIR RANDÔMICAMENTE CADA MÉTODO
        		$x = rand(1,10);
        		if($x >= 1 && $x <= 8){
        			$this->executarMania();
        		}else{
        			$this->responder();
        		}
        		
        		# INSTRUÇÃO BÁSICA DE ACESSO AOS MÉTODOS PRIVATE E PROTECTED
        		//$this->executarMania();
        		//echo '<br>';
        		//$this->responder();
        	}
        }
        class Filho extends Pai{
        	function __construct(){
        		# EXIBIR TODAS AS FUNÇÕES DESTA CLASSE TAMBÉM OS MÉTODOS PROTEGIDOS
        		echo '<pre>';
       			print_r(get_class_methods($this));
        		echo '</pre>';
        	}
        	private function executarMania(){
        		echo 'Cantar';
        	}
        	protected function responder(){
        		echo 'Ola!';
        	}
        	# INTERFACE PARA ACESSO AO MÉTODO EXECUTARMANIA()
        	public function x(){
        		$this->executarMania();
        	}
        	/*
        	* Objetos public e protected podem ser herdado
        	*/
        	/*
        	# NÃO SÃO MÉTODOS MÁGICOS __GET & __SET - MAS SÃO SEMELHANTES
        	public function getAttr($attr){
        		return $this->$attr;
        	}
        	public function setAttr($attr, $value){
        		/*
        		* Caso objeto seja private, e for usado para alterar esse valor, aqui será criado um novo
        		* atributo e portanto, será configurado com esse novo valor, mas o atributo que é herdado pela
        		* superclasse não será modificado.
        		*/
        		/*
        		$this->$attr = $value;
        	}
        	*/
        	/*
        	public function __get($attr){
        		return $this->$attr;
        	}
        	public function __set($attr, $value){
        		if(strlen($value) >= 3){
        			$this->$attr = $value;
        		}
        	}
        	*/
        }
        $filho = new Filho();
        echo '<pre>';
        print_r($filho);
        echo '</pre>';

        # EXCECUTAR MÉTODOS
      	$filho->executarAction();
        //$filho->responder(); // erro
        //$filho->x(); // ok
       	//$filho->executarMania(); erro

        # EXIBIR TODOS OS MÉTODOS PÚBLICOS DE UM OBJETO, AQUI (APLICAÇÃO) É EXIBIDO SOMENTE OS PÚBLICOS
        /*
        echo '<pre>';
        print_r(get_class_methods($filho));
        echo '</pre>';
		*/
        /*
        echo $filho->__get('nome');
        $filho->__set('nome', 'Paulo');
        echo '<br>';
		*/
        /*
        echo '<pre>';
        print_r($filho);
        echo '</pre>';
        echo $filho->__get('nome');
		*/

        # ACESSANDO ATRIBUTOS DA SUPERCLASSE PAI
        /*
		echo $filho->getAttr('nome').'<br>';
		$filho->setAttr('nome', 'Paulo');
		echo $filho->getAttr('nome');
		*/
		$pai = new Pai();
		# MÉTODOS PRIVATE
		//$pai->executarMania(); //return erro
		//$pai->responder(); //return erro
		//$pai->executarAction();


		# OBJETOS PRIVATE SOMENTE TEM ACESSO NA PRÓPRIA CLASSE
		//echo $pai->nome.'<br>';

		# ACESSANDO OBJETO PRIVATE PELA FUNÇÃO GET
		//echo $pai->__get('nome').' ';
		//echo $pai->__get('sobrenome').'<br>';
		//echo $pai->nome.' ';
		//echo $pai->sobrenome.'<br>';

		# MODIFICANDO OBJETO PRIVATE PELA FUNÇÃO SET
		//$pai->__set('nome', 'Paulo');
		//$pai->__set('sobrenome', 'Gonçalves');
		//$pai->nome = 'Paulo';
		//$pai->sobrenome = 'Oliveira';
		//$pai->setNome('');
		//echo $pai->__get('nome').' ';
		//echo $pai->__get('sobrenome').'<br>';
		//echo $pai->nome.' ';
		//echo $pai->sobrenome.'<br>';

	
		# OBJETOS PUBLIC PODEM SER ACESSADO E MODIFICADOS PELA INSTANCIA DO OBJETO
		//echo $pai->humor.'<br>';
		//$pai->humor = 'triste';
		//echo $pai->humor.'<br>';
		?>

        </div>  
      </div>
    </div>
    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>