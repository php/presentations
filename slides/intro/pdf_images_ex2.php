<?php 
 $p = PDF_new(); 
 PDF_open_file($p); 
 PDF_begin_page($p,595,842); 
 $im = pdf_open_jpeg($p, "php-big.jpg");
 pdf_place_image($p, $im, 200, 700, 1.0);
 PDF_save($p);  // Save current coordinate system settings
 $nx = 50/PDF_get_value($p,"imagewidth",$im);
 $ny = 100/PDF_get_value($p,"imageheight",$im);
 PDF_scale($p, $nx, $ny);
 pdf_place_image($p, $im, 200/$nx, 600/$ny, 1.0);
 PDF_restore($p);  // Restore previous
 pdf_close_image ($p,$im);
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
