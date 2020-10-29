<?php
	
	class Requisicao
	{
		/* URL da requisição */
		public $url;
		
		/* Método construtor: define a URL de requisição como tudo após o caminho do arquivo que realiza o chamado */
		public function __construct()
		{
			/* A URL da requisição pode estar codificada pela presença de barras de espaço e etc.
			 * Nesse caso fazemos o decode, e tomamos a substring que começa a partir da raiz do site.
			 */
			$this->url = substr(urldecode($_SERVER['REQUEST_URI']),strlen(dirname($_SERVER['SCRIPT_NAME'])));
		}
		
		/* Método para inicializar o array GET */
		public function InicializarArrayGET()
		{
			/* Remove pedaços em branco procurando / como primeiro caractere. Enquanto o primeiro caractere é / 
			 * ele é removido de forma a tirarmos pedaços vazios da URL e evitarmos entradas desnecessárias no $_GET.
			 */
			while(@strstr("/", substr($this->url,0,1)))
			{
				$this->url = substr($this->url,1);
			}
			
            $_GET = explode("/",$this->url);	
		}
	}
	
?>