<?php
class filesystem {
	function ls($dir)
	{
		return shell_exec("ls ".$dir);
	}
}

// PECL::SOAP
$server = new SoapServer(null, array('uri' => 'http://example.php/'));
$server->setClass('filesystem');
$server->handle();
?>