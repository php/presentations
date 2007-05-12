<?php
ini_set( 'include_path', '/home/derick/dev/ezcomponents/trunk:.' );
require 'Base/src/base.php';

function __autoload( $className )
{
	ezcBase::autoload( $className );
}
?>
