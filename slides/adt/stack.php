<?php
$s = new Adt_Stack();
$s->push('World');
$s->push('Hello');

echo $s->pop() . ' ' . $s->pop();
?>
