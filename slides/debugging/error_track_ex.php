<?php
function generate_backtrace($bt_array)
{
	// reverse array so we move from start to finish
	rsort($bt_array);

	$str = '';
	foreach ($bt_array as $entries) {
		$str .= "{$entries['file']}:{$entries['line']} {$entries['function']}(".implode(', ', $entries['args']).")\n";
	}

	return $str;
}
?>