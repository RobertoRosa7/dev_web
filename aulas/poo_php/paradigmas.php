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
          <h5>Paradigmas</h5>
         <?php 
			/*
			* Paradigmas de Orientação a Objeto:
			* As estruturas de dados tem comportamentos
			*
			* Paradigmas Procedural
			* As estruturas de dados tem manipulação de dados
			*/
			$a = 10;
			$b = 20;
			$operador1 = 'soma';
			$operador2 = 'subtracao';
			$operador3 = 'divisao';
			$operador4 = 'multiplicacao';
			function calcular($a, $b, $operador){
				if($operador == 'soma'){
					return $a + $b;
				}
				if($operador == 'subtracao'){
					return $a - $b;
				}
				if($operador == 'divisao'){
					return $a / $b;
				}
				if($operador == 'multiplicacao'){
					return $a * $b;
				}
				return false;
			}
			//echo calcular($a, $b, $operador4);

			# O mesmo procedimento sendo feito em Orientação a Objetos
			class Calcular{
				# atributos
				public $a = 10;
				public $b = 20;
				public $operador1 = 'soma';
				public $operador2 = 'subtracao';
				public $operador3 = 'divisao';
				public $operador4 = 'multiplicacao';

				public function calculadora($operador){
					if($operador == 'soma'){
						return $this->a + $this->b;
					}
					if($operador == 'subtracao'){
						return $this->a - $this->b;
					}
					if($operador == 'divisao'){
						return $this->a / $this->b;
					}
					if($operador == 'multiplicacao'){
						return $this->a * $this->b;
					}
					return false;
				}
			}
			$calcular = new Calcular();
			echo $calcular->calculadora($operador1);
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