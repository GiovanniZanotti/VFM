<?php

	class Template
	{
		
		private $caminho;
		public $campo;
		
		/* Método construtor: recebe o caminho do template e o nome do campo onde as páginas serão carregadas */
		public function __construct($caminho, $campoPagina)
		{
			$this->caminho = $caminho;
			$this->campo = "[".$campoPagina."]";
		}
		
		/* Método para carregar o template */
		public function Carregar()
		{
			/* Verifica a existência do arquivo */
			if ( !file_exists($this->caminho) )
			{
				throw new Exception("O template n&atilde; pode ser localizado");	
			}
			else
			{
				/* Obtém informações sobre o arquivo para verificarmos a extensão. */
				$path_parts = pathinfo($this->caminho);
				
				/* Se a extensão é php, para permitirmos execução de código, usamos output buffer junto com include 
				 * de forma que o código é executado e não somente lido.
				 */
				if ($path_parts["extension"] == "php")
				{
					ob_start();
					include($this->caminho);
					$conteudo = ob_get_contents();
					ob_end_clean();
				}
				else 
				{
					$conteudo = file_get_contents($this->caminho);	
				}
				
				return $conteudo;
			}
		}
			
	}

?>