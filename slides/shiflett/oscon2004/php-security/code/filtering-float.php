<?php

$clean = array();

if ($_POST['num'] == strval(floatval($_POST['num'])))
{
	$clean['num'] = $_POST['num'];
}

?>
