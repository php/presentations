<?php
require 'ezc-setup.php';
$optionHandler = new ezcConsoleInput();

$file = new ezcConsoleOption(
	'f', 'file', ezcConsoleInput::TYPE_STRING
);
$file->mandatory = true;
$optionHandler->registerOption( $file );

try
{
     $optionHandler->process();
}
catch ( ezcConsoleException $e )
{
	die( $e->getMessage() );
}

echo "Processing file: ",
	$optionHandler->getOption( 'f' )->value, "\n";
?>
