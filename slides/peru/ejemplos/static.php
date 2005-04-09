<?php

    class Singleton {
        private static $instance;

        private function __construct() { /* ... */ }

        static function getInstance() {
            if (empty(self::$instance)) {
                self::$instance = new Singleton();
            }
            return self::$instance;
        }
    }

    $var1 = Singleton::getInstance();
    $var2 = Singleton::getInstance();

    if ($var1 === $var2) {
        echo 'El patrón de diseño de Singleton se pasa';
    }
?>
