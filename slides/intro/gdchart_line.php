<?php
 Header("Content-type: image/png");
 $chart = new gdchart(LINE);
 $chart->add(array(2.5, 5.1, 8.6, 12.0, 15, 9, 8, 7));
 $chart->add(array(5.0, 8.0, 9.2, 10.2, 7, 8, 10, 9));
 $chart->add(array(8.0, 10.0, 14.0, 18.2, 16, 14, 12, 10));
 $chart->labels = array("Jan","Feb","Mar","Apr","May","Jun","Jul", "Aug");
 $chart->colors = array(0x1133aa, 0xaa3311, 0x33aa11);
 $chart->out(640,480,IMG_PNG);
?>
