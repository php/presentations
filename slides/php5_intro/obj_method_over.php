<?php
class math {
	function __call($name, $args)
	{
		switch ($name) {
			case 'add':
				return array_sum($args);
			case 'subtract':
				$val = array_shift($args);
				foreach ($args as $v) $val /= $v;
				return $val;
		}
	}
}

$m = new math();
echo $m->add(1,2); // will print 3
echo $m->subtract(8,2); // will print 4
?>