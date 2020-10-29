<?php

    class MetaTags {
    
        // Definição de propriedades
        
        private $paginas = array();
        private $name    = array();
        private $content = array();
        
        public function Adicionar($pagina,$name,$content) {
            $paginas[] = $pagina;
            $name[]    = $name;
            $content[] = $content;
        }
        
        public function Exibir() {
            print_r($this->paginas);
            echo "<br />";
            print_r($this->name);
            echo "<br />";
            print_r($this->content);
            echo "<br />";
        }
    
    }

?>