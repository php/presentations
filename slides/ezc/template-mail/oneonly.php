<?php
require '../include/ezc-setup.php';
require '../include/template_function_call.php';

$tpl = new ezcTemplate();
$tpl->configuration->addExtension( "TemplateFunctionCall" );
$tpl->send->listing = array( 1 => 'Item 1', 2 => 'Item 2' );

echo $tpl->process( 'oneonly.ezt' );
?>
