<?php
function cache_start()
{
	global $cache_file_name, $age;

	// a superbly creative way for creating cache files
	$cache_file_name = __FILE__ . '_cache';

	// default cache age
	if (empty($age)) $age = 600;

	// check if cache exists and if the cached data is still valid
	if (@filemtime($cache_file_name) + $age > time()) {
		// Yey! cache hit, output cached data and exit
		readfile($cache_file_name);
		unset($cache_file_name);
		exit;
	}

	// nothing in cache or cache is too old
	ob_start();
}

function cache_end()
{
	global $cache_file_name;

	// nothing to do
	if (empty($cache_file_name)) return;

	// fetch output of the script
	$str = ob_get_clean();

	// output data to the user, so they don't need to wait
	// for the cache writing to complete
	echo $str;
	
	// write to cache
	fwrite(fopen($cache_file_name.'_tmp', "w"), $str);
	// atomic write
	rename($cache_file_name.'_tmp', $cache_file_name);
}

cache_start();

// set cache termination code as the exit handler
// this way we don't need to modify the script
register_shutdown_function("cache_end");
?>