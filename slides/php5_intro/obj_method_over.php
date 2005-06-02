<?php
class math {
	function __call($name, $args)
	{
		switch ($name) {
			case 'add':
				return array_sum($args);
			case 'divide':
				$val = array_shift($args);
				foreach ($args as $v) $val /= $v;
				return $val;
		}
	}
}

$m = new math();
echo $m->add(1,2); // will print 3
echo $m->divide(8,2); // will print 4
?>
