<?php	
	// Version: 1.02 //

	//Não esquecer de colocar na TAG <form enctype="multipart/form-data">
	
	$email_destinatario = "ti@projetoweb.com.br";
	$form_servidor		= "form@teste.com.br";
	$nome = "Form <$form_servidor>";
	$Cc = "";	
	
	$site = $_SERVER['HTTP_HOST'];	
	date_default_timezone_set('America/Araguaina');
	$hora = date('d / M / Y - H:i');	
	$email_assunto = "Formulario: $site";
	if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
	elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
	

	$campos = $_POST['campo'];

	$email_conteudo = "<b>Data do envio:</b> $hora <br />\n<br />\n";
	
	$boundary = "XYZ-" . date("dmYis") . "-ZYX";
	$email_conteudo = "--$boundary\n";
	$email_conteudo .= "Content-Transfer-Encoding: 8bits\n";
	$email_conteudo .= "Content-Type: text/html; charset=\"UTF-8\"\n\n"; //plain
	
	foreach($campos as $key => $value){
		$email_conteudo .= "<b>$key: </b>" . $value . "<br />\n"; 
	}
	$email_conteudo .= "--$boundary\n";
	
	$arquivo = isset($_FILES["arquivo"]) ? $_FILES["arquivo"] : FALSE;  
	if(file_exists($arquivo["tmp_name"]) and !empty($arquivo)){ 	 
		$fp = fopen($_FILES["arquivo"]["tmp_name"],"rb"); 
		$anexo = fread($fp,filesize($_FILES["arquivo"]["tmp_name"])); 
		$anexo = base64_encode($anexo); 	 
		fclose($fp);	 
		$anexo = chunk_split($anexo); 
		
		
		$email_conteudo .= "Content-Type: ".$arquivo["type"]."" . $quebra_linha . ""; 
		$email_conteudo .= "Content-Disposition: attachment; filename=\"".$arquivo["name"]."\"" . $quebra_linha . ""; 
		$email_conteudo .= "Content-Transfer-Encoding: base64" . $quebra_linha . "" . $quebra_linha . ""; 
		$email_conteudo .= "$anexo" . $quebra_linha . "";
		$email_conteudo .= "--$boundary--\r\n";
	}
	
	$header  = "From: " . $nome . $quebra_linha  . "Reply-To:" . $campos['E-Mail'] . $quebra_linha;;
	$header .= "Content-type: multipart/mixed; charset=UTF-8; boundary=\"$boundary\"\r\n";
	$header .= "Return-Path: " . $form_servidor . $quebra_linha; // Se "não for Postfix"
	$header	.= "Cc: $Cc".$quebra_linha;
	$header .= "$boundary\n";

	$arr1 = array("<b>","</b>","<br />", "\n");
	$arr2 = array("","","", chr(13).chr(10));
	
	$date = date("Y-m-d-H-i");
	
	$txt = str_replace($arr1, $arr2, $email_conteudo);
	
	if(!file_exists('formulario')) mkdir('formulario');
	$fp = fopen("formulario/".$date.".txt", "w");
	 
	$escreve = fwrite($fp, $txt);
	 
	fclose($fp); 

	if(mail($email_destinatario, $email_assunto, $email_conteudo, $header, "-r$form_servidor"))
	{
		session_start();
		$_SESSION['enviado'] = 1;
		header("Location: http://$site");
	}
	else
	{
   		print_r('ERRO');
	}

?>
 