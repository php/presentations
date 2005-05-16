<?php
$a = new RecursiveIteratorIterator( new RecursiveDirectoryIterator($dir) );
foreach ($a as $v) {
	echo "Size of: ".$v->getPath()."/".(string) $v . " is ".
	$v->getSize()." bytes\n";
}
?>
			                      