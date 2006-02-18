<?php
ini_set( 'include_path', '/home/derick/ezcomponents-1.0:.' );
require 'Base/src/base.php';

function __autoload( $className )
{
	ezcBase::autoload( $className );
}
?>
