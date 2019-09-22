<?php 
# iniciando sessão para recuperar o Id dos usuários
session_start();

# fazendo um filtro de entrada de dados
$titulo = str_replace('#','-',$_POST['titulo']);
$categoria = str_replace('#','-',$_POST['categoria']);
$descricao = str_replace('#','-',$_POST['descricao']);

# constante PHP_EOL - adiciona uma quebra de linha com base no sistema operacional
# formatar POST para string, porque é um objeto de array
$texto = $_SESSION['id']. '#'. $titulo. '#' .$categoria. '#' .$descricao . PHP_EOL;

# fopen('nome_arquivo.txt', 'abrir, ler, escrever'): função nativa do php - precisa de dois parâmetros	
$arquivo = fopen('../../../app_help_desk/arquivo.txt', 'a');

# fwrite('referencia_do_arquivo', 'texto_que_será_escrito')
fwrite($arquivo, $texto);

# fclose('referencia_do_arquivo_aberto')
fclose($arquivo);

#redirecionamento
header('Location: abrir_chamado.php');