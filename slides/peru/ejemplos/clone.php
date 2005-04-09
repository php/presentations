<?php
    class Sheep {
        private $name;

        function __construct($name) {
            $this->setName($name);
        }

        function setName($name) {
            $this->name = $name;
        }

        function getName() {
            return $this->name;
        }
    }

    $wooly = new Sheep('wooly');
    $dolly = clone $wooly;
    $dolly->setName('dolly');

    echo "Esta ovejita es ".$wooly->getName()."<br />\n";
    echo "Y esta otra es ".$dolly->getName()."\n";
?>
