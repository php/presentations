<?php
function log_error_sqlite($errno, $errstr, $errfile, $errline) 
{
	global $edbh;

	if (!$edbh) {
		$edbh = sqlite_open("errors.sqlite");
		sqlite_query(
		'create table errors (
			errno, 
			errstr, 
			errfile, 
			errline
		)', $edbh);
	}

	sqlite_query(sprintf("insert into errors values ('%s', '%s', '%s', '%s')", 
		sqlite_escape_string($errno), 
		sqlite_escape_string($errstr), 
		sqlite_escape_string($errfile), 
		sqlite_escape_string($errline)), $edbh);
}
set_error_handler('log_error_sqlite');

$result = 1 / 0;
?>
