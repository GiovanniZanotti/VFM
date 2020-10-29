<?php

	class MotorTemplates
	{
		private $dados = array();
		public $inicio;
		public $pagina;
		public $template;
		public $erros = array();
		
		/* Método para setar dados: Utilizamos um método inves do acesso direto para reduzir as dependencias. */
        public function SetDados($campo,$valor) 
		{
            $this->dados[$campo] = $valor;
        }
		
		public function SetDadosDeArrayPorURL($campo, $array)
		{
			if (!empty($this->arquivo))
			{
				$url = substr($this->arquivo, 0, strlen($this->arquivo)-strlen($this->ext));
				
				if (array_key_exists($url, $array))
				{
					$this->SetDados($campo, $array[$url]);	
				}
				else
				{
					$this->SetDados($campo, NULL);	
				}
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
			if ($this->ext == ".php")
			{
				ob_start();
				include($this->caminho);
				$pagina = ob_get_contents();
				ob_end_clean();	
			}
			else
			{
				$pagina = file_get_contents($this->caminho);
			}
				
			$this->conteudo = str_replace($this->template->campo,$pagina,$this->template->Carregar());
			$this->RealizarSubstituicoes();
			return $this->conteudo;
        }
	}

?>