<?php
$FV = array(0 => 1, 
            1 => 1);

function Fib($n) {
  global $FV;
  if (!is_int($n) || $n < 0) {
	return 0;
  }
  
  if(!isset($FV[$n])) {
	$FV[$n] = Fib($n - 2) + Fib($n - 1);
  }
  
  return $FV[$n];
}
?>
