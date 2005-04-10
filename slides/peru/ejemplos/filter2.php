<?php
    class chicha_filter extends php_user_filter {
        function filter($in, $out, &$consumed, $closing) {
            while ($bucket = stream_bucket_make_writeable($in)) {
                // convertir entidades y remover HTML tags
                $bucket->data = strip_tags($bucket->data);
                $bucket->data = html_entity_decode($bucket->data);
                // remover espacios y otras cosas no imprimibles
                $bucket->data = preg_replace('/(\s|\xa0)+/',' ',$bucket->data);
                // remover las vocales 
                $re = '/[aeiouAEIOU]+/';
                $bucket->data = preg_replace($re,'',$bucket->data);
                $consumed += $bucket->datalen;
                stream_bucket_append($out, $bucket);
            }
            return PSFS_PASS_ON;
        }
    }
    
    // registrar el filtro
    stream_filter_register('chicha', 'chicha_filter');
    $filter = 'filter/read=chicha';
    $resource = 'resource=http://www.google.com';
    $data = file_get_contents("php://$filter/$resource");
    // los primeros 50 caracteres
    echo substr($data,0,50);
?>
