<?php 
 $p = PDF_new(); 
 PDF_open_file($p); 

 PDF_begin_page($p,595,842); 
 $im = pdf_open_png($p, "fr-flag.png");
 pdf_add_thumbnail($p, $im);
 pdf_close_image($p,$im);
 $top = PDF_add_bookmark($p, "Countries");
 $font = PDF_findfont($p,"Helvetica-Bold","host",0);
 PDF_setfont($p, $font, 20);
 PDF_add_bookmark($p, "France", $top);
 PDF_show_xy($p, "This is a page about France", 50, 800);
 PDF_end_page($p); 

 PDF_begin_page($p,595,842); 
 $im = pdf_open_png($p, "dk-flag.png");
 pdf_add_thumbnail($p, $im);
 pdf_close_image($p,$im);
 PDF_setfont($p, $font, 20);
 PDF_add_bookmark($p, "Denmark", $top);
 PDF_show_xy($p, "This is a page about Denmark", 50, 800);
 PDF_end_page($p); 

 PDF_close($p); 
 $buf = PDF_get_buffer($p); 
 $len = strlen($buf);
 Header("Content-type:application/pdf");
 Header("Content-Length:$len"); 
 Header("Content-Disposition:inline; filename=gra2.pdf");
 echo $buf; 
 PDF_delete($p); 
?>
