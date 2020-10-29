<?php	

header("Content-Type: text/html; charset=utf-8",true);

	
	function verificacao($dados,$obrigatorio){		
		$dados = (!get_magic_quotes_gpc()) ? addslashes($dados) : $dados;		
		$dados = trim($dados);		$dados = strip_tags($dados);		
		
		if ( $obrigatorio == true ) {			
			if ( empty($dados) || !isset($dados) ) {				
			echo "<script>alert('Erro ao enviar. Preencha corretamente todos os campos do formulário.')</script>";				
			echo "<script>history.back()</script>";				
			exit;			
			}		
		}		
		
		return $dados;	
	}
	
	
	function is_email($string) {		
		if ( filter_var($string,FILTER_VALIDATE_EMAIL) ) {			
		return $string;		
		}		
	
	else {
		echo "<script>alert('Erro ao enviar. O e-mail não é válido.')</script>";			
		echo "<script>history.back()</script>";			
		exit;		
		}
	}
	
	
?>