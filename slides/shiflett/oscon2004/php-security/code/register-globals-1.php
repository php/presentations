<?php

if (authenticated_user())
{
	$authorized = true;
}

if ($authorized)
{
	include '/highly/sensitive/data.php';
}

?>
