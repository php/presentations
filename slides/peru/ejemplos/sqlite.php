<ul>
<?php
    $fname = 'presentations/slides/peru/ejemplos/direcciones.sqlite';
    @unlink($fname);
    $db = new SQLiteDatabase($fname);
    $sql = "CREATE TABLE emails (
                id INTEGER PRIMARY KEY,
                nombre STRING NOT NULL,
                correo STRING NOT NULL
                )";
    $db->queryExec($sql);

    $db->queryExec("INSERT INTO emails (nombre, correo) "
                    ."VALUES ('Atila T. Hun', 'hundude@example.com')");
    $db->queryExec("INSERT INTO emails (nombre, correo) "
                    ."VALUES ('Hermes Trismegisto', 'hermes@example.com')");
    $db->queryExec("INSERT INTO emails (nombre, correo) "
                    ."VALUES ('A. Rosenkratz', 'arose@example.com')");

    $rows = $db->arrayQuery("SELECT DISTINCT nombre,correo FROM emails");
    
    foreach ($rows as $row) {
        echo "<li><b>{$row['nombre']}</b>, {$row['correo']}</li>\n";
    }
?>    
</ul>
