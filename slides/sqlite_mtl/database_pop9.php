<?php
function check_if_exists($cc)
{
	$result = sqlite_unbuffered_query(
		"SELECT id FROM country_data WHERE cc_code_2='{$cc}'", 
		sqlite_r
	);

	$data = sqlite_fetch_array($result, SQLITE_NUM);
	return $data ? $data[0] : NULL;
}
?>