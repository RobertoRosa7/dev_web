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
          <h5>Funções de manipulação de Arrays</h5>
          <?php 
          $array = 'string';
          $retorno = is_array($array);
          if($retorno){
            echo 'Sim, é um array';
          }else{
            echo 'Não, não é um array';
          }
          echo '<hr>';

          $array2 = [1 => 'a', 7 => 'b', 14 => 'c'];
          echo '<pre>';
          print_r($array2);
          echo '</pre>';

          # retorno da função array_keys encapsulado na variável
          $chaves = array_keys($array2);
          echo '<pre>';
          print_r($chaves);
          echo '</pre>';
          echo '<hr>';

          # ordenação dos arrays
          $array3 = ['Notebook', 'Ultrabook', 'Android', 'IOS Iphone', 'Macbook', 'Ubuntu LTS 1804'];
          echo '<pre>';
          print_r($array3);
          echo '</pre>';

          # se a função sort() conseguir ordenar retorna true, em contrapartida retorna false
          sort($array3);
          echo '<pre>';
          print_r($array3);
          echo '</pre>';
          echo '<hr>';

          # ordenação apenas dos valores - mantém os índices
          $array4 = ['Notebook', 'Ultrabook', 'Android', 'IOS Iphone', 'Macbook', 'Ubuntu LTS 1804'];
          echo '<pre>';
          print_r($array4);
          echo '</pre>';

          # se a função sort() conseguir ordenar retorna true, em contrapartida retorna false
          asort($array4);
          echo '<pre>';
          print_r($array4);
          echo '</pre>';
          echo '<hr>';
          
          # contagem dos elementos do array
          $array5 = ['Notebook', 'Ultrabook', 'Android', 'IOS Iphone', 'Macbook', 'Ubuntu LTS 1804'];
          echo '<pre>'; 
          print_r($array5);
          echo count($array5);
          echo '</pre>';

          # juntando array em um só
          $array6 = ['Linux', 'Windows', 'MacBook'];
          $array7 = array('Android', 'Iphone', 'WindowsPhone');
          $array8 = ['Unix', 'Solaris'];

          # array_merge retorna um novo array
          $novo_array = array_merge($array6,$array7,$array8);
          echo '<pre>'; 
          print_r($novo_array);
          echo '</pre>';

          # explode('delimitador', $string) divide uma string baseado em um delimitador
          $string = '26/02/1987 <br>';
          $array_explode = explode('/', $string);
          echo '<pre>';
          echo $string;
          print_r($array_explode);
          echo '</pre>';

          # implode('delimitador', $string) junta array em uma única string com o delimitador
          $array9 = ['a', 'b', 'z', 'x', 'u'];
          $array_implode = implode(',',$array9);
          echo $array_implode;

          # verificar se o parâmetro é um array
          # is_array(array)

          # retorna todas as chaves (índices) do array
          # array_keys(array)

          # ordena array e reajusta seus índices (chaves)
          # sort(array)

          # ordena array e mantém seus índices
          # asort(array)

          # conta a quantidade de elementos de um array
          # count(array)

          # funde um array ou mais
          # array_merge(array)

          # divide uma string baseada em um delimitador
          # explode(array)

          # junta elementos de um array em uma string
          # implode(array)
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