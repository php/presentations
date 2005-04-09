<?php
abstract class Animal {

    abstract function hacerRuido();

}

class Gato extends Animal {

    function hacerRuido() {
        echo "Guau!, este... Miau! Miau!";
    }

}

$michi = new Gato();
$michi->hacerRuido();
?>
