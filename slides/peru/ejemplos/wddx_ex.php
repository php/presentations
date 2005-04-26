<?php
    $usuario = array (
                'name' => 'John Q. Public',
                'email' => 'jqp@example.com',
                'account' => array (
                                'type' => 'editor',
                                'scope' => 'global'
                                )
                );
    
    $wddx = wddx_packet_start('Propiedades de usuario');
    wddx_add_vars($wddx, 'usuario');
    $xml = wddx_packet_end($wddx);
    echo $xml;
?>
