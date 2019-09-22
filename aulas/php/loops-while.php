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
          <h5>Loops - while</h5>
          <?php 
          # Loops - while(condicao){code};


          # executa o bloco de código enquanto a condição for verdadeira
          $num = 0;
          echo '--- Início do Loop--- <br>';
          while($num < 10){
            echo "$num <br>";
            $num++; //incrementa num, evita loop infinito
          };
          echo '--- Fim do Loop--- <br>';

          # critérios de parada do Loop infinito - break
          echo '--- Início do Loop--- <br>';
          while(true){
            echo "$num <br>";
            $num += 5; // critério de parada
            //verifica a condição
            if($num > 100){
              break; // realiza a parada do loop
            }
          }
          echo '--- Fim do Loop--- <br>';

          # critério de parada do Loop infinito continue
          # continue descarta o bloco de código sequencial, e retorna para o início do loop
          echo '<hr>';
          $num1 = 0;
          while($num1 < 10){
            $num1++; //incremento, como critério obrigatório, senão entra em loop infinito

            # verifica as condições e descarta o código após
            if($num1 == 2 || $num1 == 6){
              continue;
            }
            # impressão do 2 e 6 será descartada
            echo "$num1 <br>";
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