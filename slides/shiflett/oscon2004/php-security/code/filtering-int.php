<?php

$clean = array();

if ($_POST['num'] == strval(intval($_POST['num'])))
{
	$clean['num'] = $_POST['num'];
}

?>
