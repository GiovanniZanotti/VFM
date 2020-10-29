<?php
		
	class ConfiguracaoDiretorios
	{
		const Ds = DIRECTORY_SEPARATOR;
		
		private $baseDir;
		private $includesDir;
		private $classesDir;
		private $paginasDir;
		private $templateDir;
		private $jsDir;
		
		public function __construct()
		{
			$nomesDiretorios = array();
			
			/* Nomes de Diretórios usados */
			$nomesDiretorios["includes"] = "includes";
			$nomesDiretorios["classes"]  = "classes";
			$nomesDiretorios["js"]       = "js";
			$nomesDiretorios["paginas"]  = "template/html";
			$nomesDiretorios["template"] = "template";
			
			$this->ChecarConfiguracoes($nomesDiretorios);
			
			$this->baseDir = $_SERVER['SCRIPT_FILENAME'];
			// Definição do diretorio de includes
            $this->includesDir = $this->baseDir.Ds.$nomesDiretorios["includes"].Ds;
			// Definição do diretorio de Classes
			$this->classesDir = $this->includesDir.Ds.$nomesDiretorios["classes"].Ds;
			// Definição do diretorio de paginas
            $this->paginasDir = $this->baseDir.Ds.$nomesDiretorios["paginas"].Ds;
			// Definição do diretorio de template
            $this->templateDir = $this->baseDir.Ds.$nomesDiretorios["template"].Ds; 
			// Definição do diretorio de Js
            $this->jsDir = $this->baseDir.Ds.$nomesDiretorios["js"].Ds;
		}
		
		protected function ChecarConfiguracoes($configuracoes)
		{
			foreach ($configuracoes as $diretorio)
			{
				if (!isset($diretorio) || empty($diretorio))
					throw new Exception('Configurações ausentes');
			}
		}
		
		public function GetBaseDir()
		{
			return $this->baseDir;	
		}
		
		public function GetIncludesDir()
		{
			return $this->includesDir;
		}
		
		public function GetClassesDir()
		{
			return $this->classesDir;	
		}
		
		public function GetJSDir()
		{
			return $this->jsDir;	
		}
		
		public function GetPaginasDir()
		{
			return $this->paginasDir;	
		}
		
		public function GetTemplateDir()
		{
			return $this->templateDir;	
		}
	}
	
?>