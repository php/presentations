<?php
// some functions to be exposed via XML-RPC
function uptime_func($method_name, $params, $app_data)
{
	return shell_exec('uptime');
}
                  
function ls_func($method_name, $params, $app_data)
{
	$args = '';
	foreach ($params as $parm) {
		$args .= escapeshellarg($parm) . ' ';
	}

	return shell_exec("ls {$args}");
}
                                  
// create server
$xmlrpc_server = xmlrpc_server_create();

// Register PHP functions as XML-RPC methods
xmlrpc_server_register_method($xmlrpc_server, "ls", "ls_func");
xmlrpc_server_register_method($xmlrpc_server, "uptime", "uptime_func");

// execute XML-RPC method based on the request which can be found inside
// _GET['query']. The returned response is immidiately returned to the user

echo xmlrpc_server_call_method($xmlrpc_server, base64_decode($_GET['query']), NULL);

// free resources
xmlrpc_server_destroy($xmlrpc_server);
?>