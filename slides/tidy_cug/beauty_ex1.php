<?php
	$tidy = new tidy_doc();

	tidy_setopt($tidy, "indent", 2);
	tidy_setopt($tidy, "indent-spaces", 4);
	tidy_setopt($tidy, "wrap", 4096);
	
	$tidy->parse_file("function.tidy-get-output.html");
	
	tidy_clean_repair($tidy);
	
	echo $tidy;
