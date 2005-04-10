<?php
    $filter = 'filter/read=string.strip_tags';
    $resource = 'resource=http://pear.php.net/group';
    $data = file_get_contents("php://$filter/$resource");
    // removamos espacios, etc.:
    $data = preg_replace('/\s+/','',$data);
    // y convirtamos las entidades
    $data = html_entity_decode($data);
    // mostremos los primeros 20 caracteres
    echo substr($data,0,20)."\n";
?>
