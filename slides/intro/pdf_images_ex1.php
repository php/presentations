<?php 
 $p = PDF_new(); 
 PDF_open_file($p); 
 PDF_begin_page($p,595,842); 
 $im = pdf_open_jpeg($p, "php-big.jpg");
 pdf_place_image($p, $im, 200, 700, 1.0);
 pdf_place_image($p, $im, 200, 600, 0.75);
 pdf_place_image($p, $im, 200, 535, 0.50);
 pdf_place_image($p, $im, 200, 501, 0.25);
 pdf_place_image($p, $im, 200, 486, 0.10);
 $x = pdf_get_value($p, "imagewidth", $im);
 $y = pdf_get_value($p, "imageheight", $im);
 pdf_close_image ($p,$im);
 $font = PDF_findfont($p,"Times-Bold","host",0);
 PDF_setfont($p,$font,28.0);
 pdf_show_xy($p,"$x by $y",25,800);
 PDF_end_page($p); 
 PDF_close($p); 
 $buf = PDF_get_buffer($p); 
 $len = strlen($buf);
 Header("Content-type:application/pdf");
 Header("Content-Length:$len"); 
 Header("Content-Disposition:inline; filename=coords.pdf");
 echo $buf; 
 PDF_delete($p); 
?>
