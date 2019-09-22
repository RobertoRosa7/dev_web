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
    <script>
      function requisitarPagina(url){
        // remover qualquer no filho que a div possui
        document.getElementById('conteudo').innerHTML = ''
        
        // verificação se caso não exista o gif de loading
        if(!document.getElementById('loading')){
          // criar um gif
          let imgLoading = document.createElement('img')
          imgLoading.id = 'loading'
          imgLoading.src = 'loading.gif'
          imgLoading.className = 'rounded mx-auto d-block'
          document.getElementById('conteudo').appendChild(imgLoading)
        }
      
        // criando um novo objeto para xmlhttprequest
        let ajax = new XMLHttpRequest()

        // state = 0, requisição não inicializada
        //console.log(ajax.readyState)
        // metodo open() responsável pela url requisitada
        ajax.open('GET', url)
        // state = 1, conexão estabelecida com servidor
        //console.log(ajax.readyState)


        // alguma logica que fique de olhando o progresso da requisição 
        ajax.onreadystatechange = () => {
          if(ajax.readyState == 4 && ajax.status == 200){

            document.getElementById('conteudo').innerHTML = ajax.responseText
            //document.getElementById('conteudo').innerHTML = 'Requisição finalizada com sucesso! Status 200.'
            //console.log('requisição finalizada com sucesso! O status 200')
            //document.getElementById('loading').remove()
          }
          //console.log(ajax.readyState)
          if(ajax.readyState == 4 && ajax.status == 404){
            document.getElementById('conteudo').innerHTML = '... Erro página não encontrada! :('
            //console.log('requisição finalizada, porém o recurso solicitado não foi encontrado, status 404')
            //document.getElementById('loading').remove()
          }
        }
        //console.log(ajax)
        ajax.send()
      }
    </script>
    <style>
      .menu  li a{
        font-size: 14px;
      }
    </style>
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
        <div class="col-md-3 bg-info align-self-start mr-1">

          <ul class="navbar-nav menu">
            <li class="nav-item">
              <a href="index.php" class="nav-link text-white text-uppercase">Página Inicial</a>
              <a onclick="requisitarPagina('introducao-pdo-php.php')" href="#" class="nav-link text-white text-uppercase">introdução ao PDO PHP</a>
              <a onclick="requisitarPagina('criando-conexao.php')" href="#" class="nav-link text-white text-uppercase">criando conexao</a>
              <a onclick="requisitarPagina('tratando-exception.php')" href="#" class="nav-link text-white text-uppercase">tratando exception</a>
              <a onclick="requisitarPagina('instrucoes-sql.php')" href="#" class="nav-link text-white text-uppercase">instruções sql</a>
              <a onclick="requisitarPagina('pdostatement.php')" href="#" class="nav-link text-white text-uppercase">pdo statement</a>
              <a onclick="requisitarPagina('metodo-fetch.php')" href="#" class="nav-link text-white text-uppercase">método fetch</a>
              <a onclick="requisitarPagina('foreach-recuperando-registros.php')" href="#" class="nav-link text-white text-uppercase">foreach - registro</a>
              <a onclick="requisitarPagina('sql-injection.php')" href="#" class="nav-link text-white text-uppercase">sql injection</a>
              <a onclick="requisitarPagina('prepare-statement.php')" href="#" class="nav-link text-white text-uppercase">prepare statement</a>
            </li>
          </ul>

        </div>
        <div class="col-md-8 bg-light ml-1">
          <h1 class="text-center text-primary">Painel de exercícios de PHP</h1><hr>
          <div id="conteudo">
            <h1 class="display-4 text-black-50 text-center">
              PDO PHP novos recursos!
            </h1>
          </div>
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