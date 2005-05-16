<?php
$contents = file_get_contents(dirname(__FILE__) . "/cpu_info");
$contents = trim($contents,"\n");
echo nl2br($contents);
?>