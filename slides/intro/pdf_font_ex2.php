<?php 
  $p = PDF_new(); 
  PDF_open_file($p); 
  PDF_set_info($p,"Creator","hello.php"); 
  PDF_set_info($p,"Author","Rasmus Lerdorf"); 
  PDF_set_info($p,"Title","Hello world (PHP)"); 
  pdf_set_parameter($p, "resourcefile", "/usr/share/fonts/pdflib/pdflib.upr"); 
  PDF_begin_page($p,595,842); 
  PDF_set_text_pos($p,25,800); 
  $fonts = array('Courier'=>0,'Courier-Bold'=>0,'Courier-BoldOblique'=>0,
                 'Courier-Oblique'=>0,'Helvetica'=>0,'Helvetica-Bold'=>0,
                 'Helvetica-BoldOblique'=>0,'Helvetica-Oblique'=>0,
                 'Times-Bold'=>0,'Times-BoldItalic'=>0, 'Times-Italic'=>0,
                 'Times-Roman'=>0, 'LuciduxSans'=>1,'Utopia-Regular'=>1,
                 'URWGothicL-BookObli'=>1, 'URWPalladioL-Roma'=>1,
                 'NimbusMonL-ReguObli'=>1,'CANDY'=>1, 'Arial'=>1
                );

  foreach($fonts as $f=>$embed) { 
	$font = PDF_findfont($p,$f,"host",$embed); 
	PDF_setfont($p,$font,25.0); 
	PDF_continue_text($p,"$f (".chr(128)." Ç à á â ã ç è é ê)");
  }
  PDF_end_page($p); 
  PDF_close($p); 
  $buf = PDF_get_buffer($p); 
  $len = strlen($buf);
  Header("Content-type:application/pdf");
  Header("Content-Length:$len"); 
  Header("Content-Disposition:inline; filename=hello_php.pdf");
  echo $buf; 
  PDF_delete($p); 
?>
