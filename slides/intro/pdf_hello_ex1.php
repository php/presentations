<?php 
  $p = PDF_new(); 
  PDF_open_file($p); 
  PDF_set_info($p,"Creator","hello.php"); 
  PDF_set_info($p,"Author","Rasmus Lerdorf"); 
  PDF_set_info($p,"Title","Hello world (PHP)"); 
  PDF_begin_page($p,595,842); 
  $font = PDF_findfont($p,"Helvetica-Bold","host",0); 
  PDF_setfont($p,$font,38.0); 
  PDF_show_xy($p,"Hello world!",50,700); 
  PDF_end_page($p); 
  PDF_close($p); 
  $buf = PDF_get_buffer($p); 
  $len = strlen($buf);
  Header("Content-type: application/pdf");
  Header("Content-Length: $len"); 
  Header("Content-Disposition: inline; filename=hello_php.pdf");
  echo $buf; 
  PDF_delete($p); 
?>
