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
          <h5>Casting - convertendo tipos de variáveis</h5>
          <?php 
          # convertendo os tipos de variáveis
          # gettype() - retorna o tipo da variável
          $n = 10;
          $s = '23.22';
          $t = true;
          $d = 135.3;
          $f = 2.3;

          echo $n.' => '.gettype($n).'<br>';
          echo $s.' => '.gettype($s).'<br>';
          echo $t.' => '.gettype($t).'<br>';
          echo $d.' => '.gettype($d).'<br>';
          echo $f.' => '.gettype($f).'<br>';

          # para fazer a conversão o casting deve ficar a esquerda da variável 
          echo 'Realizando a conversão dos tipos primitivos de dados <br>';
          $n = (real) $n; #float | double | real
          echo $n.' => '.gettype($n).'<br>';
          $n = (string) $n;
          echo $n.' => '.gettype($n).'<br>';
          $d = (string) $d;
          echo $d.' => '.gettype($d).'<br>';
          $d = (int) $d; #int | integer
          echo $d.' => '.gettype($d).'<br>';
          $n = (int) $n; #int | integer
          echo $n.' => '.gettype($n).'<br>';
          $s = (integer) $s; # a string deve ser numérico e não caracter
          echo $s.' => '.gettype($s).'<br>';
          $s = (bool) $s; #bool | boolean - retorna 1 ou vazio
          echo $s.' => '.gettype($s).'<br>';
          $t = (integer) $t;
          echo $t.' => '.gettype($t).'<br>';
          $t = (string) $t;
          echo $t.' => '.gettype($t).'<br>';

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