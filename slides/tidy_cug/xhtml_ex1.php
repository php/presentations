<?php
	$tidy = tidy_parse_file("http://www.php.net/", array('output-xhtml' => true));
	$tidy->cleanRepair();
	echo $tidy;
?>
