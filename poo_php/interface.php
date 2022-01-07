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
          <h5>Interfaces</h5>
        <?php 
      	/*
      	* Interface:
      	* As interfaces funcionam como um espécie de contrato, as intefaces definem quais métodos devem existir
      	* obrigatóriamente dentro das classes as quais implementam. Somente os métodos atributos não fazem parte
      	*/
      	# INTERFACE SIMPLES
      	interface EquipamentoEletronicoInterface{
      		public function ligar();
      		public function desligar();

       	}
      	class Geladeira implements EquipamentoEletronicoInterface{
      		public function abrirPorta(){
      			echo 'abrir a porta';
      		}
      		public function ligar(){
      			echo 'ligar';
      		}
      		public function desligar(){
      			echo 'desligar';
      		}
      	}
      	class Tv implements EquipamentoEletronicoInterface{
      		public function trocarCanal(){
      			echo 'trocar canal';
      		}
      		public function ligar(){
      			echo 'ligar';
      		}
      		public function desligar(){
      			echo 'desligar';
      		}
      	}
      	$ge = new Geladeira();
      	$tv = new Tv();

      	# INTERFACE COMPOSTA EM UM CLASS
      	interface MamiferoInterface{
      		public function respirar();
      	}
      	interface TerrestreInterface{
      		public function andar();
      	}
      	interface AquaticoInterface{
      		public function nadar();
      	}

      	class HumanoClass implements MamiferoInterface, TerrestreInterface{
      		public function respirar(){
      			echo 'respirar';
      		}
      		public function andar(){
      			echo 'andar';
      		}
      		public function conversar(){
      			echo 'conversar';
      		}
      	}
      	class BaleiaClass implements MamiferoInterface, AquaticoInterface{
      		public function respirar(){
      			echo 'respirar';
      		}
      		public function nadar(){
      			echo 'nadar';
      		}
      		public function esguichar(){
      			echo 'esguichar';
      		}
      	}

      	# INTERFACE COM EXTENDS
      	interface AnimalInterface{
      		public function comer();
      	}
      	interface AveInterface extends AnimalInterface{
      		public function voar();
      	}

      	class PapagaioClass implements AveInterface{
      		public function voar(){
      			echo 'voar';
      		}
      		public function comer(){
      			echo 'comer';
      		}
      	}
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