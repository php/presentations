<?php 
  $p = PDF_new(); 
  PDF_open_file($p); 
  PDF_set_info($p,"Creator","hello.php"); 
  PDF_set_info($p,"Author","Rasmus Lerdorf"); 
  PDF_set_info($p,"Title","Hello world (PHP)"); 
  PDF_begin_page($p,595,842); 
  PDF_set_parameter($p,"FontOutline","CANDY==/usr/share/fonts/truetype/CANDY.ttf");
  $font = PDF_findfont($p,"CANDY","host",1); 
  PDF_setfont($p,$font,78.0); 
  PDF_set_value($p,"textrendering",2);
  PDF_setcolor($p,"fill","rgb", 0.8, 0.8, 0);
  PDF_setcolor($p,"stroke","rgb", 0, 0, 0.5);
  PDF_set_text_pos($p,20,780); 
  PDF_continue_text($p,"Ç à á â ã ç è é ê");
  PDF_continue_text($p,"This is a test");
  PDF_end_page($p); 
  PDF_close($p); 
  $buf = PDF_get_buffer($p); 
  $len = strlen($buf);
  Header("Content-type:application/pdf");
  Header("Content-Length:$len"); 
  Header("Content-Disposition:inline; filename=candy.pdf");
  echo $buf; 
  PDF_delete($p); 
?>
