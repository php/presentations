<?php
function input_tracker()
{
	$input = '';
	// itterate through all super-globals
	foreach (array('GET', 'POST', 'COOKIE', 'SERVER', 'FILES') as $v) {
		$var =& $GLOBALS['_'.$v];
		// if data is avaliable store it
		if (@count($var)) {
			$input .= "{$v}\n".var_export($var, true)."\n\n";
		}
	}

	return $input;
}

echo '<pre>' . input_tracker() . '</pre>';
?>