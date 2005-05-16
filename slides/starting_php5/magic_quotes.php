<?php
// check the state of magic quotes
if (get_magic_quotes_gpc()) {
	function normalize_quotes(&$var) {
		if (is_array($var)) {
			// itterate through the array
			array_walk($var, 'normalize_quotes');
		} else {
			// remove slashes
			$var = stripslashes($var);
		}
	}

	// go through the common list of input super-globals
	foreach (array('GET', 'POST', 'COOKIE') as $s) {
		array_walk(${'_',$s}, 'normalize_quotes');
	}
}
?>