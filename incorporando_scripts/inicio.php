<?php 

/* include(): 
* usado para incluir um arquivo php externo dentro deste pode ser incluido em qualquer parte do documento
* a diferença entre include e require é que no include existe um alerta em caso de erros no carregamento e então
* a página é carregada, já no caso do require existe um erro fatal e, não há o carregamento da página.
*/

# include 'menu.php'; // warning
# require 'menu.php'; // erro fatal

# include_once 'menu.php'; // incluído apenas uma vez dentro do documento
require_once 'menu.php'; // incluído apenas uma vez dentro do documento gerando erro fatal 

echo 'Conteúdo da página - início';

# include_once 'menu.php'; // aqui é descartado porque já está sendo incluída acima
