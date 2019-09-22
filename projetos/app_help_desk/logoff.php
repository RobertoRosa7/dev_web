<?php 
session_start();
/*
# remover os índices de sessão - unset()
echo '<pre>';
print_r($_SESSION);
echo '</pre>';

unset($_SESSION['x']); // remover apenas se existir sessão com o índice

echo '<pre>';
print_r($_SESSION);
echo '</pre>';
# destruir a variável de sessão - session_destroy()
session_destroy(); // será destruída, porém, ainda terá acesso, somete após recarregar que será aplicado
# necessário fazer um recarregamento da página, para uma nova requisição de sessão no servidor
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
*/
session_destroy();
header('Location: index.php');