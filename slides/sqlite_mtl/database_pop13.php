<?php
$query_str = ''; // init query storage string
while (($row = fgetcsv($fp, 4096))) {
	/* same old code ... */

	// append query to query list
	$query_str .= "INSERT INTO ip_ranges
		(ip_start, ip_end, country_code)
		VALUES({$row[0]}, {$row[1]}, {$country_id});";
}
// execute all inserts in one go
sqlite_query($query_str, sqlite_r);
?>