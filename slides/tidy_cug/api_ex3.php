<?php
	/* Parse a new document */
	$tidy = tidy_parse_file("http://www.coggeshall.org/");
	
	/* Clean and repair the document */
	$tidy->clean_repair();

	/* Output the results; */
	echo $tidy;
?>
