<?php
require_once "Benchmark/Iterate.php";

$test_array = create_random_array(100);

foreach(array('max', 'my_max') as $func) {
    $b = new Benchmark_Iterate;
    $b->run('10000', $func, $test_array);
    $result = $b->get();
	
    print "$func\t";
    printf("System + User Time: %1.6f\n", 
		   $result['mean']);
}


function create_random_array($size) {
	$array = array();
	for($i=0; $i < $size; $i++) {
		$array[$i] = rand();
	}
	return $array;
}

function my_max($array) {
	reset($array);
	$max = current($array);
	while( $el = next($array)) {
		if($el > $max) {
			$max = $el;
		}
	}
	return $max;
}
?>
