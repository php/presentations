<ul>
<?php
    $xml = 'presentations/slides/peru/ejemplos/libros.xml';
    $libros = simplexml_load_file($xml);

    foreach($libros->libro as $libro) {
        echo "<li>'<i>{$libro->titulo}</i>' fué "
            ."escrito por {$libro->autor}</li>\n";
    }
?>
</ul>
