<?php 
 $p = PDF_new(); 
 PDF_open_file($p); 
 $im = pdf_open_png($p, "fr-flag.png");
 $pattern = pdf_begin_pattern($p,21,14,25,18,1);
 pdf_save($p);
 pdf_place_image($p, $im, 0,0,1);
 pdf_restore($p);
 pdf_end_pattern($p);
 pdf_close_image ($p,$im);
 PDF_begin_page($p,595,842); 
 PDF_setcolor($p, "fill", "pattern", $pattern);
 PDF_setcolor($p, "stroke", "pattern", $pattern);
 pdf_setlinewidth($p, 30.0);
 PDF_circle($p,200,680,120);
 PDF_stroke($p);
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
