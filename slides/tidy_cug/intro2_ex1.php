<?php
	$tidy = tidy_parse_file("intro2_ex1.html");
	tidy_clean_repair($tidy);	
	echo tidy_get_output($tidy);	
?>
