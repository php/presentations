<?php
	// make output readable in a web-browser
	var_dump('<pre>', $variable, '</pre>');

	// Use JavaScript comments to hide debug output
	// from the users
	echo "\n<!--\n";
	print_r($array);
	echo "\n-->\n";
?>