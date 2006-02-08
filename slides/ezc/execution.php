<?php
require 'ezc-setup.php';

class myExecutionHandler extends ezcExecutionBasicErrorHandler
{
    public static function onError( Exception $exception = NULL )
    {
        echo '<div class="shadow" style="margin: 1em 4em 0.8em 3em;"><div  class="output" style="font-size: 1.8em; margin: -0.55555555555556em 0 0 -0.55555555555556em; background: #eeee33;">';
        parent::onError( $exception );
    }
}

ezcExecution::init( 'myExecutionHandler' );

//ezcExecution::cleanExit();
?>
