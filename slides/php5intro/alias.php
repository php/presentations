<?php
// refcount = 1
$name = "Sterling";
// refcount = 2, is_ref
$newname = &$name;
// refcount = 2
$newname .= " Hughes";

// Sterling Hughes
echo $newname; 
// Sterling Hughes
echo $name;
?>
