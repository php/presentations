<?php
require_once "Benchmark_RandomData.inc";

foreach(array(10, 100, 1000) as $size) {
  print "Array size $size\n";

  foreach(array('max', 'my_max') as $func) {
    $b = new Benchmark_RandomData;
    $b->run(100, $func, 
            'create_random_array', $size);
    $result = $b->get();

    print "$func\t";
    printf("System + User Time: %1.6f\n",
           $result['mean']);
  }
}
?>
