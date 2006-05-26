<?php
// generic database query wrapper 
function query_wrapper($query)
{
	$r =  mysql_query($query) 
		or trigger_error(mysql_error(), E_USER_ERROR);
	return $r;
}
	        
// fetch message based on a numeric identifier
function get_message($id)
{
	$result = query_wrapper("SELECT * FROM msg WHERE id=".$id);
	return fetch_object_wrapper($result);
}

// main code
// Use pecl/filter to avoid sql injection here
$message = get_message($_GET['id']);
?>
