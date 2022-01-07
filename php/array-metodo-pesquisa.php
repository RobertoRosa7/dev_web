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
          <h5>Array Multidimensional</h5>
          <?php 
          # Método de pesquisa dentro de arrays - caso seja muito grande
          # funções: in_array('o que busca', 'onde buscar') retorna true ou false para a existência do que está sendo procurado
          # array_search('o que busca', 'onde buscar') retorna o índice do valor buscado

          $lista_frutas = ['banana', 'manga', 'uva', 'mamão'];
          echo '<pre>';
          print_r($lista_frutas);
          echo '</pre>';

          # se for true -> 1 
          # se for false -> vazio 
          $existe = in_array('uva', $lista_frutas);
          if($existe){
            echo 'SIM! existe o item dentro array';
          }else{
            echo 'NÃO! existe o item procurado';
          }
          echo '<hr>';
          # se não achar retorna null, não é false
          $existe2 = array_search('uva', $lista_frutas);
          if($existe2 != null){
            echo 'SIM! O item existe no array';
          }else{
            echo 'NÃO! O item não existe no array';
          }

          # atribuindo uma variável de array dentro de um array multidimensional
          echo '<hr>';
          $lista_coisas = ['frutas' => $lista_frutas, 'pessoas' => ['João', 'Maria', 'José']];
          echo '<pre>';
          print_r($lista_coisas);
          echo '</pre>';

          # para fazer a pesquisa deve indicar qual array e seu índice associativo
          echo '<hr>';
          $existe3 = in_array('morango', $lista_coisas['frutas']);
          if($existe3){
            echo 'SIM! existe item dentro do array';
          }else{
            echo 'NÃO! existe item';
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