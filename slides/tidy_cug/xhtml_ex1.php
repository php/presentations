<?php
	$tidy = tidy_parse_file("http://www.php.net/");
	$tidy->setopt("output-xhtml", true);
	$tidy->clean_repair();
	echo $tidy;
?>
