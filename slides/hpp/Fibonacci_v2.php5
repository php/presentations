<?php
class Fibonacci {
  static $values = array(0 => 1, 
                         1 => 1);
  static function num($n) {
    if (!is_int($n) || $n < 0) {
	  return 0;
    }
	
    if (!isset(self::$values[$n])) {
      self::$values[$n] = self::num($n -2) + 
	                      self::num($n - 1);
    }

    return self::$values[$n];
  }
}
?>
