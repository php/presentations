<?php
funciton concat() 
{
	return implode('', get_func_args());
}

sqlite_create_function($db, 'CONCAT', 'CONCAT');
?>