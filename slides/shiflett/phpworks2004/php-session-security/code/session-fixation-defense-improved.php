<?php

session_start();

if (auth($_POST['username'],
	$_POST['password']))
{
	$_SESSION['logged_in'] = true;
	session_regenerate_id();
}
else
{
	$_SESSION['logged_in'] = false;
}

?>
