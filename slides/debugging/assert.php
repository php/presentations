<?php
function assert_c($file, $line, $msg)
{
	trigger_error("Assertion '{$msg}' failed on {$file}:{$line}");
}
        
// call this on error
assert_options(ASSERT_CALLBACK, 'assert_c');

// do not warn on error
assert_options(ASSERT_WARNING, 0); 

// exit on error
assert_options(ASSERT_BAIL, 1); 

// ignore evaluation warnings
assert_options(ASSERT_QUIET_EVAL, 1); 

// check is user passed id is numeric
assert('is_numeric($_GET["id"])');
?>