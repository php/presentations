<?php
// refcount = 1
$name = "Sterling";
// refcount = 2 (no copy)
$newname = $name;
// refcount = 2
echo $name;
// $newname is copy of $name, $newname refcount 1
// $name refcount 1
$newname .= " Hughes";
// refcount = 1
echo $newname;
?>
