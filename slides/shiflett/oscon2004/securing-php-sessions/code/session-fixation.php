<?php

session_start();

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
