<?php
function Fib($n) {
  if ($n == 0 || $n == 1) {
	return 1;
  } else {
	return Fib($n - 2) + Fib($n - 1);
  }
}
?>
