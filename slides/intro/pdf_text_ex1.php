<?php 
 $p = PDF_new(); 
 PDF_open_file($p); 
 PDF_begin_page($p,595,842); 
 $font = PDF_findfont($p,"Helvetica-Bold","host",0); 
 PDF_setfont($p,$font,38.0); 
 $text = <<<FOO
This is an example of some text inside a text box in a PDF document.
FOO;
 PDF_show_boxed($p, $text, 50, 630, 300, 200, "left");
 PDF_rect($p,50,630,300,200); PDF_stroke($p);
 PDF_show_boxed($p, $text, 50, 420, 300, 200, "right");
 PDF_rect($p,50,420,300,200); PDF_stroke($p);
 PDF_show_boxed($p, $text, 50, 210, 300, 200, "justify");
 PDF_rect($p,50,210,300,200);
 PDF_stroke($p);
 PDF_show_boxed($p, $text, 50, 0, 300, 200, "fulljustify");
 PDF_rect($p,50,0,300,200);
 PDF_stroke($p);
 PDF_show_boxed($p, $text, 375, 250, 200, 300, "center");
 PDF_rect($p,375,250,200,300);
 PDF_stroke($p);
 PDF_end_page($p); 
 PDF_set_parameter($p, "openaction", "fitpage");
 PDF_close($p); 
 $buf = PDF_get_buffer($p); 
 $len = strlen($buf);
 Header("Content-type:application/pdf");
 Header("Content-Length:$len"); 
 Header("Content-Disposition:inline; filename=coords.pdf");
 echo $buf; 
 PDF_delete($p); 
?>
