<?php
require 'ezc-setup.php';
$log = ezcLog::getInstance();
$log->source = $log->category = NULL;

// Create writers
$warningWriter = new ezcLogUnixFileWriter(
    "/tmp", "ezc-pres-warning.log", 128
);
$errorWriter = new ezcLogUnixFileWriter( 
    "/tmp", "ezc-pres-error.log", 256
);

// Create filters
$warningFilter = new ezcLogFilter;
$warningFilter->severity = ezcLog::WARNING;
$log->getmapper()->appendRule( 
    new ezcLogFilterRule( $warningFilter, $warningWriter, true )
);

$errorFilter = new ezcLogFilter;
$errorFilter->severity = ezcLog::ERROR;
$log->getmapper()->appendRule( 
    new ezcLogFilterRule( $errorFilter, $errorWriter, true )
);

// Log messages
$log->log( "Oops, this was unexpected.", ezcLog::WARNING );
$log->log( "Oh no, major problem!", ezcLog::ERROR, array(
    "category" => "SQL" )
);

echo '<font size="6">';
echo 'Warnings<br/>', nl2br( htmlspecialchars( file_get_contents( '/tmp/ezc-pres-warning.log' ) ) ), "<br/>";
echo 'Errors<br/>', nl2br( htmlspecialchars( file_get_contents( '/tmp/ezc-pres-error.log' ) ) );
?>
