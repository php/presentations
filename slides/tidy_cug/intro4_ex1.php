<?php
	$tidy = new tidy_doc();
	$tidy->parseFile("intro2_ex1.html", array("show-body-only" => true));
	$tidy->cleanRepair();

	echo $tidy;
?>
