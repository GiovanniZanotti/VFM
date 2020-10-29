<?php

    /*
        Arquivo que reune configurações de generalização
            - Diretorio Base para inclusões independetes do caminho
            - Diretorio de Includes
            - Diretorio de Paginas
            - Diretorio de Template
            - Diretorio de JS
    */
    
    // Definição do separador de diretorio
    
    define("Ds", "/");
    define("BaseDir", dirname($_SERVER['SCRIPT_FILENAME']));
	define("IncludesDir",BaseDir.Ds."includes".Ds);
	define("ClassesDir",IncludesDir."classes".Ds);
	define("TemplateDir",BaseDir.Ds."template".Ds);
	define("PaginasDir",TemplateDir."html".Ds);
	
	if ( (isset($js) && isset($paginas) && isset($template)) && (!empty($js) || !empty($paginas) || !empty($template)) )
	{
		// Definição do diretorio base na forma de link
					
		$servidor = $_SERVER['SERVER_NAME'];
		$porta    = $_SERVER['SERVER_PORT'];
		$caminho  = dirname($_SERVER['SCRIPT_NAME']);
		$caminho  = str_replace("\\","/",$caminho);
                    
		if ( $porta == 80 ) {
			$link = "https://".$servidor.$caminho;
		}
		else {
			$link = "https://".$servidor.":".$porta.$caminho;
		}
                    
		if ( substr($link,strlen($link)-1,1) == "/" ) {
			$link = substr($link,0,strlen($link)-1);
		}
                    
		if ( substr($link,strlen($link)-2,strlen($link)) == "//" ) {
			$link = substr($link,0,strlen($link)-1);
		}
                    
		define("BaseLink",$link);                    

		// Definição do link de paginas
                    
		define("PaginasLink",BaseLink."/".$paginas);
      
		// Definição do link de template
                    
		define("TemplateLink",BaseLink."/".$template);
                    
		// Definição do diretorio de Js
                    
		define("JsDir",BaseDir.Ds.$js.Ds);
                    
		// Definição do link de Js
                    
		define("JsLink",BaseLink."/".$js);
                    
		// Remoção de variáveis utilizadas
                    
		unset($servidor);
		unset($porta);
		unset($caminho);
		unset($dir);
		unset($includes);
		unset($classes);
		unset($js);
		unset($paginas);
		unset($template);
                    
		// Verificação se os diretorios existem
                    
		$diretorios = array (IncludesDir,ClassesDir,PaginasDir,TemplateDir,JsDir);
		for ( $i = 0; $i<count($diretorios); $i++ ) {
			if(!is_dir($diretorios[$i])) {
				die('O diretório '.$diretorios[$i].' não existe');
			}
		}
					
		unset($diretorios);
	}
	else
	{
		die("Configurações ausentes");	
	}
    

?>