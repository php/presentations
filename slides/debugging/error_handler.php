<?php

function sqlite_error_hadler($errno, $errstr, $errfile, $errline, $args)
{
	// Open bugs database
	$err_db = new sqlite_db("php_errors");

	$error_hash = md5($errstr, $errfile, $errline, $errno);

	// check if previous errors of the same nature, had already occured,
	// if they did update the error counter.
	$res = $err_db->query("UPDATE bugs_db SET 
			error_counter=error_counter+1 
			WHERE b_hash='{error_hash}'");

	// we got a hit, nothing more to do
	if ($res->changes()) {
		// close bug db
		unset($err_db);
		return;
	}

	// prepare data for sql insertion
	$errstr = sqlite_escape_string($errstr);
	$errfile = sqlite_escape_string($errfile);
	$errline = (int) $errline;
	$errno = (int) $errno;
	$args = sqlite_escape_string(implode(', ', $args));

	// Uh Oh, new error, let's log it.
	$err_db->query("INSERT INTO bugs_db
		(b_hash, error_counter, b_errstr, 
		b_errfile, b_errline, b_errno, b_args)
		VALUES(
			'{$error_hash}',
			1,
			'{$errstr}',
			'{$errfile}',
			{$errline},
			{$errno},
			'{$args}'
		)");

	// close bug db
	unset($err_db);
}
?>