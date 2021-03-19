<?php
/*
* PROCEDIMENTOS:
*
* Passo 01: criar os formulários e os atributos name com seus valores
* Passo 02: usar a super-global post para receber os dados submetidos no formulário
* Passo 03: criar uma classe para o objeto mensagem
* Passo 04: verificar se os dados estão sendo passados para o novo objeto instanciado pela classe mensagem
* Passo 05: verificar se os dados são válidos - fazer uma varredura e análise dos dados
* Passo 06: acessar o site packgist.org e fazer download da biblioteca PHPMailer
* Passo 07: após download mover o diretório src para o diretório de trabalho (app_send_mail)
* Passo 08: fazer a importação ou inclusão das bibliotecas para o documento
* Passo 09: copiar uma instrução de envio dos email no github https://github.com/PHPMailer/PHPMailer/tree/6.0
* Passo 10: configurar um servidor smpt de email
*/

/*
* Inclusão de bibliotecas externas para envio de email por meio do PHPMailer
*
*/
//require 'biblioteca/PHPMailer/Exception.php';
//require 'biblioteca/PHPMailer/PHPMailer.php';
//require 'biblioteca/PHPMailer/SMTP.php';
//require 'biblioteca/PHPMailer/POP3.php';
//require 'biblioteca/PHPMailer/OAuth.php';

/*
* Incorporando namespace do PHPMailer
*/
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

/*
* criação da classe de envio de mensagem
*/
class MensagemClass{
	/**
	* Envio para um endereço válido de email
	* @var null
	*/
	private $para = null;
	
	/**
	* assunto que será enviado para email
	* @var null
	*/
	private $assunto = null;
	
	/**
	* Mensagem que será o corpo do email
	* @var null
	*/
	private $mensagem = null;

	/**
	* verificação de status
	* 
	* @return array
	*/
	public $status = ['codigo_status' => null, 'descricao_status' => '' ];

	/**
	* método mágico get
	*/
	public function __get($attr){
		return $this->$attr;
	}
	
	/**
	* método mágico set
	*/
	public function __set($attr, $value){
		$this->$attr = $value;
	}

	/**
	* validar mensagem antes de enviar, uma verificação dentro dos campos
	* @return boolean
	*/
	public function mensagemValida(){
		// validação simples - verificar se os dados estão preenchidos
		if(empty($this->para) || empty($this->assunto) || empty($this->mensagem)){
			return false;
		}
		return true;
	}
}

/*
* Instanciação da classe mensagem class
*/
$mensagem = new MensagemClass();

/*
* configurando os valores vindo do formulário por meio do método post
*/
$mensagem->__set('para', $_POST['para']);
$mensagem->__set('assunto', $_POST['assunto']);
$mensagem->__set('mensagem', $_POST['mensagem']);

/*
* verificação se os campos estão preenchidos, neste caso devemos usar operador relacional de negação para poder
* fazer a verificação caso os campos não forem preechidos
*/
if(!$mensagem->mensagemValida()){
	// mata o processamento do script php
	//die();

	// redirencionamento
	header('Location: index.php');
}

/*
* Realiza a intanciação do objeto PHPMail e faz as devidas configurações básicas para envio do email e também
* faz um tratamento de possíveis erros.
*/
$mail = new PHPMailer(true);

/*
* Tratamento de erros
*/
try {
    //Server settings
    
    // habilitar debug
    $mail->SMTPDebug = false;
    // configurar o uso de SMPT
    $mail->isSMTP();
    // especificar servidor de email
    $mail->Host = 'smtp.gmail.com';
    // habilitar autenticação 
    $mail->SMTPAuth = true;
    // configurar email de usuário
  	// configurar senha
    // habilitar encriptografia TLS ou SSL para envio de email
    $mail->SMTPSecure = 'tls';
    // habilitar porta especificar para cada tipo de encriptogria
    $mail->Port = 587;


    //Recipients remetentes e destinatários
    // configurar um remetente
    $mail->setFrom('kakashi.kisura7@gmail.com', 'kakashi remetente');
    // adicionar um destinatário
    $mail->addAddress($mensagem->__get('para'));
    // adicionar quantos destinatários forem necessário - opcional
    //$mail->addAddress('ellen@example.com');
    // destinatário padrão que receberá respostas
    //$mail->addReplyTo('info@example.com', 'Information');
    // adicionar cópias de envio para outros usuários
    //$mail->addCC('cc@example.com');
    // adicionar cópias ocultas
    //$mail->addBCC('bcc@example.com');
    //Attachments
    // adicionar arquivos para envio
    //$mail->addAttachment('/var/tmp/file.tar.gz');
    // adicionar imagens para envio
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');


    //Content
    // configurar formato de HTML
    $mail->isHTML(true);
    // adicionar assunto
    $mail->Subject = $mensagem->__get('assunto');
    // adicionar o corpo do email - com formato HTML
    $mail->Body    = $mensagem->__get('mensagem');
    // adicionar o copo do email sem formato HTML
    $mail->AltBody = 'É necessário ter Cliente que suporte HTML';
    // enviar o email
    $mail->send();

    // melhorando a visualização do envio
    $mensagem->status['codigo_status'] = 1;
    $mensagem->status['descricao_status'] = 'E-mail enviado com sucesso!';

} catch (Exception $e) {
	// melhorando a visualização do envio
    $mensagem->status['codigo_status'] = 2;
    $mensagem->status['descricao_status'] = 'Não foi possível enviar este e-mail, tente mais tarde. ' . $mail->ErrorInfo;

    // lógica para armazenar possíveis erros - para fazer uma análise
}
?>
<html lang="pt-br">
	<head>
		<meta charset="utf-8" />
    	<title>App Mail Send</title>

    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	</head>
	<body>
		<div class="container">
			<div class="py-3 text-center">
				<img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
				<h2>Send Mail</h2>
				<p class="lead">Seu app de envio de e-mails particular!</p>
			</div>
			<div class="row">
				<div class="col-md-12">
					<!-- tomada de decisão com base no status -->
					<? if($mensagem->status['codigo_status'] == 1) {?>
						<div class="container">
							<h1 class="display-4 text-success">Sucesso!</h1>
							<p><?= $mensagem->status['descricao_status'] ?></p>
							<a href="index.php" class="btn btn-success btn-lg mt-5 text-white">Voltar</a>
						</div>
					<? } ?>
					<? if($mensagem->status['codigo_status'] == 2) {?>
						<div class="container">
							<h1 class="display-4 text-danger">Ops!!</h1>
							<p><?= $mensagem->status['descricao_status'] ?></p>
							<a href="index.php" class="btn btn-success btn-lg mt-5 text-white">Voltar</a>
						</div>
					<? } ?>
				</div>
			</div>
		</div>
	</body>
</html>
