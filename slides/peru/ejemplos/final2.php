<?php
    class PaletaDeColores {
        /* ... */

        final function nombreDelColor($r, $g, $b) { /* ... */ }
    }
    
    class Daltonico extends PaletaDeColores {

        // esta redefinición causa un error
        function nombreDelColor($r, $g, $b) {
            return 'gris';
        }
    }
?>
