<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    
    <title>Curso - PHP</title>
  </head>
  <body class="bg-dark">
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-8 bg-light">
          <h1 class="text-center text-primary">Painel de exercícios de PHP</h1>
          <h5>Atividade 03 - Sorteio Mega Sena</h5>
          <p class="text-justify">
            Criar um script capaz de criar um laço de repetição, um array com 6 elementos aleatórios de
            1 (um) até 60 (sessenta). Atende que os números dentro array não podem ser repetido.
          </p><hr>
          <?php 
          /*
          $num_aleatorio1 = rand(1,60);
          $num_aleatorio2 = rand(1,60);
          $num_aleatorio3 = rand(1,60);
          $num_aleatorio4 = rand(1,60);
          $num_aleatorio5 = rand(1,60);
          $num_aleatorio6 = rand(1,60);
          $num = [$num_aleatorio1,$num_aleatorio2,$num_aleatorio3,$num_aleatorio4,$num_aleatorio5,$num_aleatorio6];
          
          echo '<pre>';
          print_r($num);
          echo '</pre>';
          echo '<hr>';
          */
          $numeros = [];
          while(count($numeros) <= 5){
            $num = rand(1,60);
            if(!in_array($num, $numeros)){
              $numeros[] = $num;
            }
          }
          echo '<pre>';
          print_r($numeros);
          echo '</pre>';
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