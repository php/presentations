<?php
// Create ip2country view on the ip_ranges/country_data join
$db->query("CREATE VIEW ip2country AS 
	SELECT * FROM ip_ranges 
	INNER JOIN country_data 
		ON ip_ranges.country_code=country_data.id");

// Simpler user-land query
$db->query("SELECT country_name FROM ip2country
	WHERE {$ip_int} BETWEEN ip_start AND ip_end");
?>