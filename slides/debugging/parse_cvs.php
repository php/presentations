<?php
/* Insert into CVSROOT/commitinfo
 * DEFAULT	/path/to/php /path/to/lint.php
 */
array_shift($_SERVER['argv']);
array_shift($_SERVER['argv']);

$return_val = 0;

// loop through all files affected by commit
foreach($_SERVER['argv'] as $val) {
	// only check PHP files
	if (strrchr($val, '.') == '.php') {
		if (php_check_syntax($val, &$err) !== TRUE) {
			echo "Error: '{$err} in '{$val}'\n";
			$return_val = 1;
		}
	}
}
// got an error, abort the commit
if ($return_val) {
	exit($return_val);
}
?>