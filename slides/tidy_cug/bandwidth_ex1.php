<?php
	$tidy = tidy_parse_file("php.html");
	
	tidy_setopt($tidy, "clean", true);
	tidy_setopt($tidy, "drop-proprietary-attributes", true);
	tidy_setopt($tidy, "drop-font-tags", true);
	tidy_setopt($tidy, "drop-empty-paras", true);
	tidy_setopt($tidy, "hide-comments", true);
	tidy_setopt($tidy, "join-classes", true);
	tidy_setopt($tidy, "join-styles", true);
	
	tidy_clean_repair($tidy);
	
	echo $tidy;
?>
