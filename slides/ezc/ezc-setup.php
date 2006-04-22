<?php
ini_set( 'include_path', '/home/httpd/ezcomponents/trunk:.' );
require 'Base/src/base.php';

function __autoload( $className )
{
	ezcBase::autoload( $className );
}
?>
