<?php
class filesystem {
	function ls($dir)
	{
		return shell_exec("ls ".escapeshellarg($dir));
	}
}

// SOAP
$server = new SoapServer("urn:Object");
$server->setClass('filesystem');
$server->handle();
?>