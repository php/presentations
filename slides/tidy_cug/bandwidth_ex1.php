<?php
	
    $opts = array("clean" => true,
                  "drop-proprietary-attributes" => true,
                  "drop-font-tags" => true,
                  "drop-empty-paras" => true,
                  "hide-comments" => true,
                  "join-classes" => true,
                  "join-styles" => true);

	$tidy = tidy_parse_file("php.html", $opts);                  
	tidy_clean_repair($tidy);
	
	echo $tidy;
?>
