<?php
$fp = fopen('sample.txt', "r");
while (($line = fread("$fp", 1024)) !== false)
{
    echo $line;
}
fclose($fp);
?>