<?php
	// when expecting an integer, cast it to one
	$_GET['id'] = (int) $_GET['id'];

	// if you MUST allow a user to specify the 
	// page validate the page meticulously.
	$page = basename($_GET['page']);
	if (!preg_match('!^[A-Za-z0-9_]+$!', $page) || 
		!@file_exist("template/{$page}.php")) {
		exit;
	}

	// Do not assume automatic validation features 
	// are always enabled.
	if (!get_magic_quotes_gpc()) {
		foreach ($_GET as $key => $val) {
			$_GET[$key] = addslashes($val);
		}
	}
?>