<?php 
 $p = PDF_new(); 
 PDF_open_file($p); 
 PDF_begin_page($p,595,842); 
 PDF_setcolor($p,"fill","rgb", 1.0, 0.8, 0.1);
 PDF_moveto($p,150,750);
 PDF_lineto($p,450,750);
 PDF_lineto($p,100,800);
 PDF_curveto($p,80,500,70,550,250,650);
 PDF_closepath($p);
 PDF_fill_stroke($p);
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
