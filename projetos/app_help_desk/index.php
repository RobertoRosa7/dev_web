<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
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
        <li class="nav-item"><a href="index.php" class="nav-link">LOGIN</a></li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Login
            </div>
            <div class="card-body">
              <form action="valida_login.php" method="post" enctype="form/data">
                <div class="form-group">
                  <input type="email" class="form-control" placeholder="E-mail" name="email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="Senha" name="senha">
                </div>
                <?php
                # isset() -> verifica se um determinado índice de um array está configurado, retorna false ou true
                if(isset($_GET['login']) && $_GET['login'] == 'erro'){ ?>
                <div class="text-danger">Usuário ou senha inváliddos</div>
                <?php } ?>
                <?if(isset($_GET['login']) && $_GET['login'] == 'erro2'){ ?>
                <div class="text-danger">Faça login antes de acessar as páginas protegidas!</div>
                <? } ?>
                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>