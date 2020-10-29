<?php	
	// Version: 0.01 //
   
	$email_destinatario = "comercial@projetoweb.com.br";
	$form_servidor		= "form@projetoweb.com.br";
	$nome = "Modelo Padrao 1 <$form_servidor>";
	$Cc = "financeiro@projetoweb.com.br";	
	
	$site = $_SERVER['HTTP_HOST'];	
	date_default_timezone_set('America/Araguaina');
	$hora = date('d / M / Y - H:i');	
	$email_assunto = "Formulario: $site";
	if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
	elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
	
	$campos = $_POST['campo'];

	$email_conteudo = "<b>Data do envio:</b> $hora <br />\n<br />\n";
	
	foreach($campos as $key => $value){
		$email_conteudo .= "<b>$key: </b>" . $value . "<br />\n"; 
	}

	$arr1 = array("<b>","</b>","<br />", "\n");
	$arr2 = array("","","", chr(13).chr(10));
	
	date_default_timezone_set('America/Araguaina');
	$date = date("Y-m-d-H-i");
	
	$txt = str_replace($arr1, $arr2, $email_conteudo);
	
	if(!file_exists('formulario')) mkdir('formulario');
	$fp = fopen("formulario/".$date.".txt", "w");
	 
	$escreve = fwrite($fp, $txt);
	 
	fclose($fp); 
	
	$header  = "From: " . $nome . $quebra_linha;
	$header .= "Content-type: text/html; charset=utf-8".$quebra_linha;
	$header .= "Return-Path: " . $form_servidor . $quebra_linha; // Se "não for Postfix"
	$header	.= "Cc: $Cc".$quebra_linha;


	if(mail($email_destinatario, $email_assunto, $email_conteudo, $header, "-f$form_servidor"))
	{
		header("Location: http://$site/confirma")
	}
	else
	{
   		print_r('ERRO');
	}

?>
 