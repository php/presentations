<?php
// XXX: Presentation system hack
chdir(getcwd() . 
	  "/presentations/slides/top7");


$fp = fopen('sample.txt', "r");
while ($line = fread("$fp", 1024)) 
{
	echo $line;
}
fclose($fp);
?>
