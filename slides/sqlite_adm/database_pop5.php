<?php
function check_if_exists($cc)
{
	$result = safe_query("SELECT id FROM country_data WHERE cc_code_2='{$cc}'");

	return sqlite_fetch_array($result, SQLITE_NUM) ? TRUE : FALSE;
}
?>