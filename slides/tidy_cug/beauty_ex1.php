<?php
	$tidy = new tidy_doc();

    $opts = array("indent" => 2,
                  "indent-spaces" => 4,
                  "wrap" => 4096);
                  
	$tidy->parseFile("function.tidy-get-output.html", $opts);
	
	tidy_clean_repair($tidy);
	
	echo $tidy;
