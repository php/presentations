<?php
function get_future_date($daycount, $t = -1)
{
	if ($t == -1) {
		$t = time();
	}

	// use strtotime() instead of just multiplying by
	// 86400 * $daycount, because strtotime() takes 
	// daylight savings time into account. 
	return strtotime("now + $daycount days");
}
?>
