<?php
try {
	$d = 1 / 0;
	print $d;
} catch (Exception $e) {
	die("There was an error: " . 
		$e->getException());
}
?>
