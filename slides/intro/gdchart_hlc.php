<?php
 Header("Content-type: image/png");
 $chart = new gdchart(COMBO_HLC_AREA_3D);
 $chart->title = "High-Low-Close On top of an Area(volume) Graph";
 $chart->depth = 5.0;
 $chart->angle = 50;
 $chart->annotation_font_size = FONT_TINY;
 $chart->anno_note = "Earnings\nReport";
 $chart->anno_point = 8;
 $chart->vol_color = 0x40806040;
 $chart->grid = TICK_LABELS;
 $chart->ylabel_density = 40;
 $chart->hlc_style = HLC_CONNECTING | HLC_I_CAP | HLC_DIAMOND;
 $chart->add_scatter(17.0, 3, SCATTER_TRIANGLE_UP, 0x50808060, 30);
 $chart->add(array(17.8,17.1,17.3,17.2,17.1,17.3,17.3,17.3,17.1,17.5,17.4));
 $chart->add(array(16.4,16.0,15.7,15.25,16.0,16.1,16.8,16.5,16.8,16.2,16.0));
 $chart->add(array(17.0,16.8,16.9,15.9,16.8,17.2,16.8,17.0,16.9,16.4,16.1));
 $chart->add_combo(
   array(150.0,100.0,340.0,999.0,390.0,420.0,150.0,100.0,340.0,1590.0,700.0));
 $chart->labels = array("May","Jun","Jul","Aug","Sep","Oct","Nov","Dec","Jan","Feb","Mar","Apr");
 $chart->out(640,480,IMG_PNG);
?>
