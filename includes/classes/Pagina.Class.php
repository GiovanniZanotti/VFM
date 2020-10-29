<?php
	
	/* Definição de Página */
    class Pagina {
        
        private $dados = array();
        public $template;
		private $caminho;
        private $pasta;
		public $erro;
        private $conteudo;
        public $inicio;
        private $ext;
        public $arquivo;
		public $campoTitulo;
		public $campoMetas;
		public $campoCss;
        private $regex = '/(http|www|.php|.asp|.net|.gif|.exe|.jpg|.html|.htm)/i';
        
        /* Método construtor: recebe a pasta das páginas e a extensão a usar. */
        public function __construct($pasta = '',$ext = '.php') {
            $this->pasta = $pasta;
            $this->ext = $ext;
        }
        
        /* Método para setar dados: Utilizamos um método inves do acesso direto para reduzir as dependencias. */
        public function SetDados($campo,$valor) 
		{
            $this->dados[$campo] = $valor;
        }
        
		/* Método de definição do arquivo da página */
        public function DefinirPagina($url) 
		{
			/* O método recebe um nome de página. Se ele é vazio, definimos a inicial, se ele possui caracteres
			 * proibidos definimos a inicial, se por fim ele passa nos testes, definimos a página. 
			 */
            if ( empty($url) ) {
                $this->arquivo = $this->inicio . $this->ext;
            }
            elseif ( preg_match($this->regex,$url) ) {
                $this->arquivo = $this->inicio . $this->ext;
            }
            else {
                $this->arquivo = $url . $this->ext;
            }
			
			/* Utilizamos um iterador recursivo de diretórios para percorrer todos os arquivos
			   e subpastas da pasta de páginas a procura do arquivo de página desejado.
			   Também setamos uma flag que indica se o arquivo foi ou não encontrado para controlar o loop.
			 */
			if (file_exists($this->pasta . $this->arquivo))
			{
				$this->caminho = $this->pasta . $this->arquivo;
			}
			else
			{
				$this->arquivo = $this->erro;
				$this->caminho = $this->pasta . $this->erro . $this->ext;
			}
        }
        
		/* Método para realizar as substituições de campos por valores */
        protected function RealizarSubstituicoes() 
		{
			/* Percorremos todos os dados como pares (campo, valor) e fazemos a troca dentro de conteudo. */
            foreach ( $this->dados as $campo => $valor  ) {
                $troca    = '['.$campo.']';
                $this->conteudo = str_replace($troca,$valor,$this->conteudo);
            }
        }
        
		/* Método para carregar a página */
        public function Carregar() 
		{
			/* Verificamos se a extensão requerida é php. Isso é feito para permitir códigos em páginas php. */
			if ($this->ext == ".php")
			{
				/* Inicializamos um output buffer e permitimos a execução da página.
				 * Capturamos a saída e limpamos o buffer. 
				 */
				ob_start();
				include($this->caminho);
				$pagina = ob_get_contents();
				ob_end_clean();
				
				/* Uma vez incluída a página, temos acesso ao array de dados da página. Usamos ele para setar 
				 * o título e as meta tags.
				 */
				if (!empty($dadosPagina["titulo"]))
				{
					$this->SetDados($this->campoTitulo, $dadosPagina["titulo"]);	
				}
				else
				{
					$this->SetDados($this->campoTitulo, NULL);	
				}
				if (!empty($dadosPagina["metas"]))
				{
					$this->SetDados($this->campoMetas, implode("\n",$dadosPagina["metas"]));	
				}
				else
				{
					$this->SetDados($this->campoMetas, NULL);	
				}
				if (!empty($dadosPagina["css"]))
				{
					$this->SetDados($this->campoCss, $dadosPagina["css"]);	
				}
				else
				{
					$this->SetDados($this->campoCss, NULL);	
				}
			}
			else
			{
				/* Se a página não tem extensão php, nada é executado e o arquivo é lido normalmente. */
				$pagina = file_get_contents($this->caminho);
			}
			
			/* Colocamos o conteúdo da página no campo de conteúdo definido no template e realizamos substituições. */
			$this->conteudo = str_replace($this->template->campo,$pagina,$this->template->Carregar());
			$this->RealizarSubstituicoes();
			
			/* Finalmente o HTML da página é retornado. */
			return $this->conteudo;
        }
        
    }

?>