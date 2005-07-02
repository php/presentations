<?php
    $xml = 'libros.xml';
    $libros = simplexml_load_file($xml);

    foreach($libros->libro as $libro) {
        echo "* '{$libro->titulo}' fu&#233; "
            ."escrito por {$libro->autor}\n";
    }
?>
