<?php
function check_if_exists($cc)
{
	return sqlite_single_query(
		"SELECT id FROM country_data WHERE cc_code_2='{$cc}'", 
		sqlite_r
	);
}
?>