<?php
require_once "Benchmark/Iterate.php";

class Benchmark_RandomData 
extends Benchmark_Iterate 
{
  function run() {
	$arguments = func_get_args();

    $iterations = array_shift($arguments);
    $function_name = array_shift($arguments);
    $data_func = array_shift($arguments);

    for ($i = 1; $i <= $iterations; $i++) {
	  $data = call_user_func_array($data_func, 
	                               $arguments);

      $this->setMarker('start_' . $i);
      call_user_func_array($function_name, 
	                       $data);
      $this->setMarker('end_' . $i);
    }
  }
}
?>
