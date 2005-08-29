<?php
  $cnt_file = '/tmp/count5.php.cnt';;
  $fp = fopen($cnt_file, 'a');
  fwrite($fp,chr(65+date('H')));
  fclose($fp);
  $hits = file_get_contents($cnt_file); 
  $total = strlen($hits);
  $distribution = count_chars($hits); 
  $distribution = array_slice($distribution,65,24);

  require 'Image/Graph/Simple.php';
  $Graph = Image_Graph_Simple::factory(
    800, 600, 'Image_Graph_Plot_Smoothed_Area', $distribution,
    'Hits per Hour', 'gray', 'blue@0.5', 
    array('/usr/share/fonts/Verdana.ttf',12)
  );
  $Graph->done();
?>
