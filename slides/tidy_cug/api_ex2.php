<?php
	/* Create a new document instance */
	$tidy = new tidy_doc();
	
	/* Parse a remote URL via Streams */
	$tidy->parse_file("http://www.coggeshall.org/");

	/* Clean and repair the HTML document */
	$tidy->clean_repair();

	/* Access the error buffer */
	$error_buf = $tidy->error_buf;
	
	/* Access the output by object overloading */
	echo $tidy;	
?>
	
