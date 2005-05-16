<?php
// use xmlwriter_open_uri() for direct file writes 
$w = xmlwriter_open_memory();
xmlwriter_set_indent($w, TRUE);

xmlwriter_start_element($w, "source");
xmlwriter_start_element($w, "php");
	
// add raw data via CDATA
xmlwriter_start_cdata($w);
xmlwriter_text($w,"<?php phpinfo(); ?>");
xmlwriter_end_cdata($w);

xmlwriter_end_element($w);
xmlwriter_end_element($w);

echo '<pre>' . htmlentities(xmlwriter_output_memory($w)) . '</pre>';;
?>