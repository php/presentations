<?php
// generic database query wrapper 
function query_wrapper($query, $file, $line, $class, $function)
{
	$r = mysql_query($query);
        if (!$r) {
		trigger_error("Failed executing query '{$query}' on {$file}:{$line}
inside ".($class ? "{$class}::" : '')."{$function}()",  E_USER_ERROR);
	}
        return $r;
}
	        
// fetch message based on a numeric identifier
function get_message($id, $file, $line, $class, $function)
{
	$result = query_wrapper("SELECT * FROM msg WHERE id=".$id, $file, $line, $class, $function);
	return fetch_object_wrapper($result);
}

// main code
function foo()
{
	$message = get_message($_GET['id'], __FILE__, __LINE__, __CLASS__, __FUNCTION__);
}

foo();
?>