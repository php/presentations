<?php

$clean = array();

$email_pattern =
'/^[^@\s]+@([-a-z0-9]+\.)+[a-z]{2,}$/i';

if (preg_match($email_pattern, $_POST['email']))
{
	$clean['email'] = $_POST['email'];
}

?> 
