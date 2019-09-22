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
          <h5>Arrays com Loops</h5>
          <?php 
          # Títulos de Notícias
          $registros = [
            ['titulo' => 'Técnico em Informática', 'conteudo' => 'conteúdo 1'],
            ['titulo' => 'Desenvolvedor Web', 'conteudo' => 'conteúdo 2'],
            ['titulo' => 'Programador PHP', 'conteudo' => 'conteúdo 3'],
            ['titulo' => 'Programador Web', 'conteudo' => 'conteúdo 4'],
            ['titulo' => 'Programador JAVA', 'conteudo' => 'conteúdo 5'],
            ['titulo' => 'Programador React', 'conteudo' => 'conteúdo 6']
          ];

          # Debug
          /*
          echo '<pre>';
          print_r($registros);
          echo '</pre>';
          */

          # critério de parada para while
          $idx = 0;
          # percorrendo array multi, primeiro deve saber os índices, é necessário outra lógica para lidar com o
          # segundo array interno

          # count() -> realiza a contagem de elementos de array
          echo 'O array possui: '.count($registros).' registros';
          echo '<br>';
         
          /*
          while($idx < count($registros)){
            echo '<div class="card"><h3>'.$registros[$idx]['titulo'].'</h3>';
            echo '<p class="card-body">'.$registros[$idx]['conteudo'].'</p></div>';
           // print_r($registros[$idx]);
            echo '<hr>';
            $idx++;
          }
          */

          /*
          do{
            echo '<div class="card"><h3>'.$registros[$idx]['titulo'].'</h3>';
            echo '<p class="card-body">'.$registros[$idx]['conteudo'].'</p></div>';
            echo '<hr>';
            $idx++;
          }while($idx < count($registros));
          */

          for($idx = 0; $idx < count($registros); $idx++){
            echo '<div class="card"><h3>'.$registros[$idx]['titulo'].'</h3>';
            echo '<p class="card-body">'.$registros[$idx]['conteudo'].'</p></div>';
            echo '<hr>';
          }


          # condição menor que 3 por há somente índice
          /*
          #percorrendo um array simples
          while($idx < 3){
            # retorna o valor contido nos índice
            $titulo = $registros[$idx];
            echo "<div class='card'>$titulo</div>";
            // echo '<div class="card">'.$titulo.'</div>';
            $idx++; // controle de existência do loop, sem isto entraria no loop infinito
          }
          */

          ?>
         <!-- 
          está fora do loop, portanto, somente imprime o último valor do índice do array
          <div class="card"><?= $titulo ?></div>
         -->
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