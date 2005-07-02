<?php
    class PaletaDeColores {
        /* ... */

        final function nombreDelColor($r, $g, $b) { /* ... */ }
    }
    
    class Daltonico extends PaletaDeColores {

        // esta redefinicion causa un error
        function nombreDelColor($r, $g, $b) {
            return 'gris';
        }
    }
?>
