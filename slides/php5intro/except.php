<?php
define('NUM', 10);
try {
	if (NUM < 20) {
		throw new Exception(
			NUM . " is too small!"
		);
	}
} catch (Exception $e) {
	echo $e->getMessage();
	echo "\n<br />\n";
}
?>
