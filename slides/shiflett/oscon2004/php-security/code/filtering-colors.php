<?php

$clean = array();

switch ($_POST['color'])
{
	case 'red':
	case 'green':
	case 'blue':
		$clean['color'] = $_POST['color'];
		break;
}

?>
