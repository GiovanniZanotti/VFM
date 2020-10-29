<?php
	
	/* Requer as configurações do site */
	if ( file_exists("ini/config.php") )
	{
		require("ini/config.php");
	}
	else
	{
		die("As configura&ccedil;&otilde;es est&atilde;o ausentes");	
	}
	
	/* Requer as definições de constantes */
	if ( file_exists("ini/defines.php") )
	{
		require("ini/defines.php");
	}
	else
	{
		die("As configura&ccedil;&otilde;es est&atilde;o ausentes");	
	}
	
	/* Requer a classe de requisição */
	if ( file_exists(ClassesDir."Requisicao".".Class.php") )
	{
		include(ClassesDir."Requisicao.Class.php");
	}
	else
	{
		die("As configura&ccedil;&otilde;es est&atilde;o ausentes");
	}
	
	/* Requer a classe de template */
	if ( file_exists(ClassesDir."NotFoundException".".Class.php") )
	{
		include(ClassesDir."NotFoundException.Class.php");
	}
	else
	{
		die("As configura&ccedil;&otilde;es est&atilde;o ausentes");
	}
	
	/* Requer a classe de página */
	if ( file_exists(ClassesDir."Pagina".".Class.php") )
	{
		include(ClassesDir."Pagina.Class.php");
	}
	else
	{
		die("As configura&ccedil;&otilde;es est&atilde;o ausentes");
	}
	
	/* Requer a classe de template */
	if ( file_exists(ClassesDir."Template".".Class.php") )
	{
		include(ClassesDir."Template.Class.php");
	}
	else
	{
		die("As configura&ccedil;&otilde;es est&atilde;o ausentes");
	}
?>