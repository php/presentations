<?php
	$tidy = new tidy_doc();
	$tidy->setopt("show-body-only", true);
	$tidy->parse_file("intro2_ex1.html");
	$tidy->clean_repair();

	echo $tidy;
?>
