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
          <h5>Pilar Polimorfismo</h5>
        <?php 
        /*
        * Polimorfismo: trata-se de sobreescrever métodos herdados pelas super-classes
        */
        # MODELO QUE REPRESENTA ABSTRAÇÃO CARRO
		class Carro extends Veiculo{
			public $tetoSolar = true;

			function __construct($placa, $cor){
				$this->__set('placa', $placa);
				$this->__set('cor', $cor);
			}
			function abrirTetoSolar(){
				echo 'abrir teto solar <br>';
			}
			function alterarPosicaoVolante(){
				echo 'alterar posição do volante <br>';
			}
		}
		# MODELO QUE REPRESENTA ABSTRAÇÃO MOTO
		class Moto extends Veiculo{
			public $contraPesoGuidao = true;
			function __construct($placa, $cor){
				$this->__set('placa',$placa);
				$this->__set('cor', $cor);
			}
			function empinar(){
				echo 'empinar <br>';
			}
			# POLIMORFISMO - SOBREESCREVE A MESMA FUNÇÃO DECLARADA NA SUPER-CLASSE VEÍCULO
			function trocarMarcha(){
				return 'Desengatar marcha com a mão e engatar com o pé';
			}
		}
		# MODELO QUE REPRESENTA ABSTRAÇÃO DE VEÍCULO - CLASS MÃE
		class Veiculo{
			public $placa = null;
			public $cor = null;
			public $trocarMarcha = null;
			
			function __get($attr){
				return $this->$attr;
			}
			function __set($attr, $val){
				$this->$attr = $val;
			}

			function acelerar(){
				return 'acelerar';
			}
			function freiar(){
				return 'Freiar';
			}
			function trocarMarcha(){
				return 'Desengatar embreagem com o pé e engatar marcha com a mão';
			}
		}
		# MODELO QUE REPRESENTA ABSTRAÇÃO DE VEÍCULO CAMINHÃO
		class Caminhao extends Veiculo{	}


		$car = new Carro('ACB1234', 'BRANCO');
		$moto = new Moto('DEF1234', 'VERMELHA');
		$cami = new Caminhao();
		echo '<pre>';
		print_r($car);
		echo '</pre>';
		//echo $moto->trocarMarcha().'<br>';
		//echo $cami->trocarMarcha();
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