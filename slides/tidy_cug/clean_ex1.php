<?php
	$tidy = tidy_parse_file("clean_ex1.html");
	tidy_setopt($tidy, "clean", true);
	tidy_clean_repair($tidy);
	echo $tidy;		
?>
