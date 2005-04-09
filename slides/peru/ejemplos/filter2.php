<?php
    class remove_vowels_filter extends php_user_filter {
        function filter($in, $out, &$consumed, $closing) {
            while ($bucket = stream_bucket_make_writeable($in)) {
                $bucket->data = 
                        preg_replace('/[a-zA-Z]+/','',$bucket->data);
                $consumed += $bucket->datalen;
                stream_bucket_append($out, $bucket);
            }
            return PSFS_PASS_ON;
        }
    }
    
    // registrar el filtro
    stream_filter_register('remove_vowels', 
                     'remove_vowels_filter');
    $filter = 'filter/read=remove_vowels';
    $resource = 'resource=http://www.google.com';
    $data = file_get_contents("php://$filter/$resource");
?>
