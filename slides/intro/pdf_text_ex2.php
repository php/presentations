<?php 
 $p = PDF_new(); 
 PDF_open_file($p); 
 PDF_begin_page($p,595,842); 
 $font = PDF_findfont($p,"Helvetica-Bold","host",0); 
 PDF_setfont($p,$font,38.0); 
 PDF_set_parameter($p, "overline", "true");
 PDF_show_xy($p, "Overlined Text", 50,780);
 PDF_set_parameter($p, "overline", "false");
 PDF_set_parameter($p, "underline", "true");
 PDF_continue_text($p, "Underlined Text");
 PDF_set_parameter($p, "strikeout", "true");
 PDF_continue_text($p, "Underlined strikeout Text");
 PDF_set_parameter($p, "underline","false");
 PDF_set_parameter($p, "strikeout","false");
 PDF_setcolor($p,"fill","rgb", 1.0, 0.1, 0.1);
 PDF_continue_text($p, "Red Text");
 PDF_setcolor($p,"fill","rgb", 0, 0, 0);
 PDF_set_value($p,"textrendering",1);
 PDF_setcolor($p,"stroke","rgb", 0, 0.5, 0);
 PDF_continue_text($p, "Green Outlined Text");
 PDF_set_value($p,"textrendering",2);
 PDF_setcolor($p,"fill","rgb", 0, .2, 0.8);
 PDF_setlinewidth($p,2);
 PDF_continue_text($p, "Green Outlined Blue Text");
 
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
