<?php 
function get_error($errno, $errstr, $errfile, $errline) {
	print "Fuddy Duddy error in $errfile on $errline [$errno]: $errstr\n";
}

set_error_handler('get_error');

$d = 1 / 0;
print $d;
?>
