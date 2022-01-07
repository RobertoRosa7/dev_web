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
    <!-- Variáveis constantes:
    As variáveis podem ser feita como de costume em ambientes de desenvolvimento que envolve a criação local e em
    ambiente de produção que trata-se do servidor ativo, isto é, online. Assim, temos dois ambientes de sendo
    assim as variáveis constantes, são as mesmas mudando apenas os valores.

    Para criar variáveis constantes devemos usar uma função: define() esta função requer dois parâmetros sendo o
    primeiro o nome da variável e o segundo o seu valor, não é necessário o uso do cifrão

    -->
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-8 bg-light">
          <h1 class="text-center text-primary">Painel de exercícios de PHP</h1>
          <h5>Switch</h5>
          <?php 

          $valor = 6;
          switch($valor){
            case 1:
              echo 'case 1';
              break;
            case 'string':
              echo 'case 2';
              break;
            case true:
              echo 'case 3';
              break;
            default:
              echo 'Nenhuma das opções';
          }

          # caso ocorra de ter dois tipos boolean o primerio será executado primeiro devido a precedência
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