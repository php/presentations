<?php

switch ($_POST['form'])
{
	case 'login':
		$allowed = array();
		$allowed[] = 'form';
		$allowed[] = 'username';
		$allowed[] = 'password';

		$sent = array_keys($_POST);

		if ($allowed == $sent)
		{
			include '/inc/logic/process.inc';
		}

		break;
}

?>
