<?php
    // en una libreria general
    final class NotasLiterales {
        /* ... */

        function obtenerNota($alumno) {
            return 'F';
        }
    }

    /* ------------ */

    // un *lamer* sin acceso a la libreria quiere
    // modificar el comportamiento de la clase
    class MisNotasMostras extends NotasLiterales {

        function obtenerNota($alumno) {
            return 'A';
        }
    }
    // pero todo lo que obtiene es un error
?>
