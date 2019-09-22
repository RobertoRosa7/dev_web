<?php 
session_start();
# verificando se existe uma sessão criada e é igual ao sim de autenticação
if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM'){
  header('Location: index.php?login=erro2');
}
?>
