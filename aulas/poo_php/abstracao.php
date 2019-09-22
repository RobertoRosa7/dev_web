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
          <h5>Abstração</h5>
        <?php 
		/*
		* Abstração:
		* Entidade | Identidade | Característica | Ações
		* 
		* Entidade: Trata-se de uma ideia de um objeto com base na observação, trazer a ideia de um objeto para
		* para o mundo da programação, assim, quando pensamos em um objeto (copo) temos a ideia de suas composição
		* forma e utilidadde. 
		*
		* Identidade: Trata-se de fazer a instanciação do que era apenas uma ideia (abstração) para a realidade
		* fazer da classe (modelo) um objeto capaz de realizar ações.
		* 
		* Características: Trata-se da descrição do objeto, o que este objeto possui, (tamanho, cor, peso, etc..)
		* 
		* Ações: Trata-se da utilidade, o que este objeto pode fazer
		*
		* Operadoer $this-> significa recuperar o valor das variáveis (atributos) desta classe, assim para poder
		* ter acesso aos atributos desta classe é preciso usar $this->variavel
		*/

		# MODELO
		class Funcionarios{
			# Atributos
			public $nome = 'José';
			public $tel = '(11) 99614-4467';
			public $numFilhos = 2;
			
			# Métodos
			public function resumirCadFunc(){
				return "O funcionário $this->nome possui $this->numFilhos (s)";
			}
			public function modificarNumFilhos($numFilhos){
				$this->numFilhos = $numFilhos;
			}
		}
		# INSTANCIAÇÃO DA CLASSE PARA OBJETO
		$y = new Funcionarios();
		echo $y->resumirCadFunc();
		echo $y->modificarNumFilhos(10);
		echo '<br>';
		echo $y->resumirCadFunc();
		echo '<hr>';
		$x = new Funcionarios();
		echo $x->resumirCadFunc();
		echo $x->modificarNumFilhos(1);
		echo '<br>';
		echo $x->resumirCadFunc();
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