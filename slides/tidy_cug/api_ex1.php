<?php
	/* Parse a file */
	$tidy1 = tidy_parse_file("myfile.html");
	
	/* Parse a string */
	$tidy2 = tidy_parse_string("<HTML><B>Hello!</B>");	

	/* Clean up the markup */
	tidy_clean_repair($tidy1);
	tidy_clean_repair($tidy2);
	
	/* Get the error buffer */
	$errors = tidy_get_error_buffer($tidy1);
	/* Get the output */
	$output = tidy_get_output($tidy2);
?>
