<?php
$q = new ADT_Queue();
$q->insert("Hello");
$q->insert("World");
echo $q->extract() . " " . $q->extract();
?>
