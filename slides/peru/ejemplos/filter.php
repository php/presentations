<?php
    $filter = 'filter/read=string.strip_tags';
    $resource = 'resource=http://pear.php.net/group';
    $data = file_get_contents("php://$filter/$resource");
?>
