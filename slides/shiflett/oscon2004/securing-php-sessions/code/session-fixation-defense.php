<?php

session_start();

if (!isset($_SESSION['initiated']))
{
	session_regenerate_id();
	$_SESSION['initiated'] = true;
}

?>
