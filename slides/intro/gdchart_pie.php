<?php
 Header("Content-type: image/png");
 $chart = new gdchart(PIE_3D);
 $chart->title = "This is a Sample Pie Chart";

 $chart->title_font = "/usr/share/fonts/truetype/CANDY.ttf ";
 $chart->title_ptsize = 24;

 $chart->label_font = "/usr/share/fonts/truetype/Jester.ttf";
 $chart->label_ptsize = 16;

 $chart->edge_color = 0x000000;
 $chart->labels = array("red","green\r\n(exploded)",
                        "lt blue","purple","missing","cyan","blue");
 $chart->add(array(12.5, 20.1, 2.0, 22.0, 5.0, 18.0, 13.0));
 $chart->missing = array(FALSE, FALSE, FALSE, FALSE, TRUE, FALSE, FALSE);
 $chart->explode = array(0,40,0,0,0,0,0);

 $chart->pie_depth = 30;
 $chart->perspective = 0;
 $chart->pie_angle = 90;
 $chart->label_line = false;
 $chart->percent_labels = LABEL_ABOVE;

 $chart->out(640,480,IMG_PNG);
?>
