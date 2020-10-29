<?php

    class Servidor {
        
        // Definição de Propriedades
        
        protected $endereco;
        protected $porta;
        protected $referer;
        
        // Definição de Métodos
        
        public function __construct() {
            $this->DefineServidor();
            $this->DefinePorta();
            $this->DefineReferer();
            $this->DefineUrl();
        }
        
        private function DefineServidor() {
            $this->endereco = $_SERVER['SERVER_NAME'];
        }
        
        private function DefinePorta() {
            $this->porta    = $_SERVER['SERVER_PORT'];
        }
        
        private function DefineReferer() {
            $this->referer  = $_SERVER['HTTP_REFERER'];
            
            if ( strstr($this->referer,"index.php?") ) {
                $array = explode("?",$this->referer);
                $this->referer = $array[0];
            }
        }
        
        private function DefineUrl() {
            echo $_SERVER['REQUEST_URI'];
        }
        
        public function GetEndereco() {
            return $this->endereco;
        }
		
		public function GetPorta() {
			return $this->porta;	
		}
		
		public function GetReferer() {
			return $this->referer;	
		}
        
    }

?>