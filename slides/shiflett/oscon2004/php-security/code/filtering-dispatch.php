<?php

/* Global security measures */

switch ($_GET['task'])
{
	case 'print_form':
		include '/inc/presentation/form.inc';
		break;
	case 'process_form':
		$form_valid = false;
		include '/inc/logic/process.inc';
		if ($form_valid)
		{
			include
			'/inc/presentation/end.inc';
		}
		else
		{
			include
			'/inc/presentation/form.inc';
		}
		break;
	default:
		include
		'/inc/presentation/index.inc';
		break;
}
?>
