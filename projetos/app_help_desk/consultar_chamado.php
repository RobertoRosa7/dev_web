<?php
require_once 'validador_acesso.php';
# chamadas registradas
$chamadas = [];
# abrir o arquivo de chamada
$arquivo = fopen('../../../app_help_desk/arquivo.txt', 'r');

# feof(): testa o fim de um arquivo, retorno true ou false
# percorrer todas as linhas dentro do arquivo
while(!feof($arquivo)){
  # linhas
  $registro = fgets($arquivo);

  # converter registro em um array
  $registro_detalhes = explode('#', $registro);
  
  # exibir conteúdo dos chamados, somente para usuarios de perfis 2
  if($_SESSION['perfil_id'] == 2){
    # se o id da sessão for diferente dos registros não será exibidos
    if($_SESSION['id'] != $registro_detalhes[0]){
      continue;
    }else{
      # adicionar o registro do arquivo no array $chamadas
      $chamadas[] = $registro;
    }
  }else{
    # adicionar o registro do arquivo no array $chamdas
    $chamadas[] = $registro;
  }
}
# fechar o arquivo
fclose($arquivo);
?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item"><a href="logoff.php" class="nav-link">SAIR</a></li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              <?foreach($chamadas as $chamada){ ?>
              <?php

              $dados_chamadas = explode('#', $chamada);
              # verifica a quantidade de índice e limpa o excesso caso seja maior que 3
              if(count($dados_chamadas) < 3){
                continue;
              }
              ?>
              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?= $dados_chamadas[1] ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $dados_chamadas[2] ?></h6>
                  <p class="card-text"><?= $dados_chamadas[3] ?></p>

                </div>
              </div>
              <? } ?>
              <div class="row mt-5">
                <div class="col-6">
                  <a href="home.php" class="btn btn-lg btn-warning btn-block" type="submit">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>