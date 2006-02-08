<?php
require 'ezc-setup.php';
if ( ezcInputForm::hasGetData() )
{
	$definition = array(
		'test'  => new ezcInputFormDefinitionElement(
			ezcInputFormDefinitionElement::REQUIRED, 'int' ),
		'test2'  => new ezcInputFormDefinitionElement(
			ezcInputFormDefinitionElement::REQUIRED, 'number_int' ),
	);

	try
	{
		$form = new ezcInputForm( INPUT_GET, $definition );
		echo $form->test, "\n";
		echo $form->test2, "\n";
	}
	catch ( ezcInputFormException $e )
	{
		die( $e->getMessage() );
	}
}
?>
