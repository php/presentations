<?php
 Header("Content-type: image/png");
 $chart = new gdchart(AREA_3D);
 $chart->depth = 5;
 $chart->xtitle = "Fruits";
 $chart->xtitle_color = 0xffff00;
 $chart->bg_color = 0x112233;
 $chart->xlabel_color = 0xffffff;
 $chart->ylabel_color = 0xffffff;
 $chart->colors = array(0x30ffff00, 0x30ff00ff, 0x3000ffff);
 $chart->add(array(2.5, 5.1, 8.6, 12.0));
 $chart->add(array(5.0, 8.0, 9.2, 10.2));
 $chart->add(array(8.0, 10.0, 14.0, 18.2));
 $chart->labels = array("Apples","Oranges","Melons","Pears");
 $chart->out(640,480,IMG_PNG);
?>
