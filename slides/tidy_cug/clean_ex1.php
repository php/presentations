<?php
	$tidy = tidy_parse_file("clean_ex1.html", array("clean" => true));
	tidy_clean_repair($tidy);
	echo $tidy;		
?>
