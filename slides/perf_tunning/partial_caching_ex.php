<?php
// Authenticates a user and stores their id inside $uid
require "./user_auth.inc.php";

function header()
{
	if ($uid) echo "Welcome {$GLOBALS['user_nick']}";
	echo rest_of_header();
}

function footer()
{
	if ($uid) 
		echo "Logout: <a href='/logout.php'>{$GLOBALS['user_nick']}</a>";
	echo rest_of_footer();
}

// cache the output of the header function
// we append $uid to they key to ensure each user has their own
// non conflicting entry.
mmcache_cache_output(__FILE__ . $uid, 'header();', 60 * 24);
	
// rest of the dynamic page
	
// cache the output of the footer for 24 minutes (avg. session length)
mmcache_cache_output(__FILE__ . $uid, 'footer();', 60 * 24);
?>