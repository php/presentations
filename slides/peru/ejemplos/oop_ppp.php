<?php
    class Animal {
        private $id; // accesible solo por una instancia
        protected $tipo; // accesible por instancias y subclases
        public $nombre; // accesible en cualquier contexto
        
        function __construct($id, $tipo) {
            $this->asignarID($id);
            $this->asignarTipo($tipo);
        }

        public function asignarID($id) { 
            if ($this->verificarID($id)) {
                $this->id = $id;
            }
        }
        protected function asignarTipo($tipo) { 
            $this->tipo = $tipo;
        }
        private function verificarID($id) { 
            return is_numeric($id);
        }
    }

    class Iguana extends Animal {
        function __construct($nombre) {
            $this->asignarTipo('reptil');
            $this->nombre = $nombre;
        } 
    }

    $loro = new Animal(1, 'ave');
    $loro->nombre = 'silencioso';  // no hay problema
    $loro->verificarID(); // genera un error, método privado
    
    $verde = new Iguana('verde');
    echo $verde->tipo; // genera un error, propiedad protegida
?>
