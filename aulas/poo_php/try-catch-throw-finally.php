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
          <h5>Try - Catch - Throw - Finally</h5><hr>
        <?php
          /*
          * Tratamento de erros:
          * try: tente
          * catch: pegue
          * finally: finalize - opcional se usar catch
          * throw: lance ou passe pra frente
          */
          # RESPONSÁVEL POR ENCAPSULAR ERROS - TENTE
          try{
          # LÓGICA QUE TRATA DE UM POSSÍVEL ERRO 
            echo '<h3>*** try ***</h3>';
            //$sql = 'select * from clientes';
            //mysql_query($sql);

          # SITUAÇÃO DE TESTE - ESTÁ FUNÇÃO RETORN TRUE OR FALSE, SE EXISTIR É TRUE, SENÃO É FALSE
          if(!file_exists('arquivo.txt')){
            #4 CLASSE EXCEPTION NATIVA DO PHP
            throw new Exception('O arquivo em questão não estava disponível as '.date('d/m/Y H:i').' horas, mas vamos sequir mesmo assim');
          }

          }catch(Error $e){
            # TRATAMENTO DE POSSÍVEIS ERROS - CATCH SOMENTE APARECE QUANDO HÁ ERROS NO TRY
            echo '<h3>*** catch Error ***</h3>';
            echo '<p class="text-danger">'.$e.'</p>';

            # ARMAZENAR ERRO EM BANDO DE DADOS PARA FAZER POSTERIORMENTE UMA TRATATIVA
          }catch(Exception $ex){
            echo '<h3>*** catch Exception***</h3>';
            echo '<p class="text-danger">'.$ex.'</p>';

          }
          # PEGAR OS ERROS 
          finally{
            echo '<h3>*** Finally ***</h3>';
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