<?php 
 $p = PDF_new(); 
 PDF_open_file($p); 
 PDF_begin_page($p,595,842); 
 PDF_moveto($p,150,750);
 PDF_lineto($p,450,750);
 PDF_lineto($p,100,800);
 PDF_curveto($p,80,500,70,550,250,650);
 PDF_stroke($p);
 PDF_end_page($p); 
 PDF_close($p); 
 $buf = PDF_get_buffer($p); 
 $len = strlen($buf);
 Header("Content-type:application/pdf");
 Header("Content-Length:$len"); 
 Header("Content-Disposition:inline; filename=gra1.pdf");
 echo $buf; 
 PDF_delete($p); 
?>
