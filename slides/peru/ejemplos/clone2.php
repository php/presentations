<?php
    class Sheep2 {
        public $type;
        private $name;

        function __construct($name) {
            $this->type = "original";
            $this->setName($name);
        }

        function __clone() {
            $this->type = "clonada";}

        function setName($name) {
            $this->name = $name;
        }

        function getName() {
            return $this->name;
        }
    }

    $wooly = new Sheep2('wooly');
    $dolly = clone $wooly;
    $dolly->setName('dolly');

    echo "Esta ovejita es ".$wooly->getName()." y es {$wooly->type}<br />\n";
    echo "Y esta otra es ".$dolly->getName()." y es {$dolly->type}\n";
?>
