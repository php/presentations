<?php

session_start();

if (!isset($_SESSION['initiated']))
{
	session_regenerate_id();
	$_SESSION['initiated'] = true;
}

if (!isset($_SESSION['visits']))
{
	$_SESSION['visits'] = 1;
}
else
{
	$_SESSION['visits']++;
}

echo $_SESSION['visits'];

?>
