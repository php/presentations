<?php
$fp = fopen('sample.txt', "r");
while ($line = fread("$fp", 1024)) 
{
	echo $line;
}
fclose($fp);
?>
