<?php
if (get_magic_quotes_gpc()) {
	$input = array(&$_GET, &$_POST, &$_COOKIE, &$_ENV, &$_SERVER);
	while (list($k,$v) = each($input)) {
		foreach ($v as $key => $val) {
			if (!is_array($val)) {
				$input[$k][$key] = stripslashes($val);
				continue;
			}
			$input[] =& $input[$k][$key];
		}
	}
	unset($input);
}
?>                                                                                                                                                                                                        