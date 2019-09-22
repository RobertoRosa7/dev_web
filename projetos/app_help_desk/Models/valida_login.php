<?php 
/* O HTTP request recolhe as informações via GET ou POST, enviando-os para o servidor, o Apache realiza
* as verificações e responde ao cliente via HTTP.
* O script é enviado pelo atributo action do formulário, sendo passado o caminho absolute ou apenas o arquivo
* php, podendo ser externo.
*
*/
/* Iniciando uma sessão - por padrão deve ser inicializada no início
* com a sessão atua somene na instancia do browser, não poderá compartilhar os valores da sessão em navegadores
* diferentes, portanto, a sessão cria um ID que dura cerca de 3 horas após o fechamento do browser, sendo assim
* podemos criar a partir desse ponto, um controle que será responsável pelo gerenciamento das outras página.
* 
* Toda página que requer um autenticação deverá passar pela página de login, e quem fará essa verificação será
* a sessão. Trata-se de uma região de memória do lado do servidor será armazenada para a instancia do brower
* sempre que o navegador realizar requisições ao servidor, o identificador único (ID) será encaminhado na requisição

*/
session_start();

# Verificação de usuários
$usuario_autenticado = false;
$usuario_id = null;
$usuario_perfil_id = null;

# adicionado perfis para redirecionamento das páginas
$perfis = [1 => 'administrativo', 2 => 'usuarios'];

/* Usuários do sistema
* Um ID será usado para cada usuário, sendo seu identificador no sistema, assim poderemos redirecionar para cada
* usuário um página pessoal
*/
$usuarios_app = [
	['id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '1234', 'perfil_id' => 1],
	['id' => 2, 'email' => 'user@teste.com.br', 'senha' => '1234', 'perfil_id' => 1],
	['id' => 3, 'email' => 'jose@teste.com.br', 'senha' => '1234', 'perfil_id' => 2],
	['id' => 4, 'email' => 'maria@teste.com.br', 'senha' => '1234', 'perfil_id' => 2]
];
# percorrendo cada um dos índices do array,
foreach($usuarios_app as $user){
	if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
		$usuario_autenticado = true;
		$usuario_id = $user['id'];
		$usuario_perfil_id = $user['perfil_id'];
		#Debug
		//print_r($user);
	}
	# fazendo as comparações com usuário app e form
	/*
	echo 'Usuário app: '.$user['email'].' / '.$user['senha'];
	echo '<br>';
	echo 'Usuário form: '.$_POST['email'].' / '.$_POST['senha'];
	echo '<hr>';
	*/
}
if($usuario_autenticado){
	# iniciando um sessão
	$_SESSION['autenticado'] = 'SIM';
	$_SESSION['id'] = $usuario_id;
	$_SESSION['perfil_id'] = $usuario_perfil_id;
	
	#redirecionamento para página home
	header('Location: home.php');
	}else{
		$_SESSION['autenticado'] = 'NÃO';
		# redirecionamento de página
		header('Location: index.php?login=erro');
	}

/*
echo '<pre>';
print_r($usuarios_app);
echo '</pre>';


print_r($_POST);
echo '<hr>';
echo $_POST['email'];
echo '<br>';
echo $_POST['senha'];
*/