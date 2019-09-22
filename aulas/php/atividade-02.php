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
          <h5>Atividade 02 - criar um calculo para imposto de renda</h5>
          <p>
            Com base no sálario passado por parâmetro, para calcular o imposto de renda considere a tabela abaixo
          </p>
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>BASE PARA CÁLCULO</th>
                <th>ALÍQUOTA</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Até R$ 1.903,98</td>
                <td>Isento</td>
              </tr>
              <tr>
                <td>De R$ 1.903,99 até R$ 2.826,65</td>
                <td>7,5%</td>
              </tr>
              <tr>
                <td>De R$ 2.826,66 até R$ 3.751,05</td>
                <td>15%</td>
              </tr>
              <tr>
                <td>De R$ 3.751,06 até R$ 4.664,68</td>
                <td>22,5%</td>
              </tr>
              <tr>
                <td>Acima de R$ 4.668,68</td>
                <td>27,5%</td>
              </tr>
            </tbody>
          </table>
          <?php 
            function calcularImposto($salario){
              $imposto = 0;
              if($salario < 1903.99){
                $imposto = 'Isento';
              }else if($salario >= 1903.99 && $salario < 2826.65){
                $imposto = ($salario * 7.5)/100;
              }else if($salario >= 2826.66 && $salario < 3751.05){
                $imposto = ($salario * 15)/100;
              }else if($salario >= 3751.06 && $salario < 4664.68){
                $imposto = ($salario * 22.7)/100;
              }else if($salario > 4664.64){
                $imposto = ($salario * 27.5)/100;
              }
              return $imposto;
            }
            $valor = calcularImposto(6299.99);
            $valor = number_format($valor,2,",",".");
          ?>
          <h3 class="text-center text-info">R$ <?= $valor ?></h3>
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