<?php


// Inicia a sessão

session_start();
header("Content-Type: text/html; charset=UTF-8", true);
	
	/* Verifica a existência do arquivo de inicialização e o requer caso exista. */
	if ( file_exists("ini/init.php") )
	{
		require("ini/init.php");
	}
	else 
	{
		die("As configurações estão ausentes.");
	}
	
	/* Cria uma nova requisição, uma nova página e seta o template da página. */
	$requisicao = new Requisicao();
	
	$pagina = new Pagina(PaginasDir,'.php');
	
	$pagina->template = new Template(TemplateDir.Ds."template.php", "conteudo");
	
	/* Inicializa o Array $_GET */
	$requisicao->InicializarArrayGET();
	
	/* Seta o nome da pagina inicial, bem como o nome da página de erro. */
	$pagina->inicio = "index";
	$pagina->erro = "404";
    
    /* Define o nome do arquivo da página: nesse caso, o nome deve ser o conteúdo de $_GET[0]. */
	$pagina->DefinirPagina($_GET[0]);
	
    /* Definimos o Link Base no template, o link de template, os títulos e meta tags. */
    $pagina->SetDados('url',BaseLink);
    $pagina->SetDados('template',TemplateLink);
	$pagina->campoTitulo = "pagina";
	$pagina->campoMetas  = "meta";
	$pagina->campoCss  = "css";
    
    /* A página é carregada para o navegador. */
    echo $pagina->Carregar();
	

?>