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

 // Circle
 PDF_setcolor($p,"fill","rgb", 0.8, 0.5, 0.8);
 PDF_circle($p,400,600,75);
 PDF_fill_stroke($p);

 // Funky Arc
 PDF_setcolor($p,"fill","rgb", 0.8, 0.5, 0.5);
 PDF_moveto($p, 200, 600);
 PDF_arc($p,300,600,50,0,120);
 PDF_closepath($p);
 PDF_fill_stroke($p);

 // Dashed rectangle
 PDF_setcolor($p,"stroke","rgb", 0.3, 0.8, 0.3);
 PDF_setdash($p,4,6);
 PDF_rect($p,50,500,500,300);
 PDF_stroke($p);

 PDF_end_page($p); 
 PDF_close($p); 
 $buf = PDF_get_buffer($p); 
 $len = strlen($buf);
 Header("Content-type:application/pdf");
 Header("Content-Length:$len"); 
 Header("Content-Disposition:inline; filename=gra3.pdf");
 echo $buf; 
 PDF_delete($p); 
?>
