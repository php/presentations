<?php
$w = xmlwriter_open_memory("writer.xml");
xmlwriter_set_indent($w,true);

// verbose version
xmlwriter_start_element_ns($w,"dc","subject","http://purl.org/dc/elements/1.1/");
xmlwriter_text($w,"Verbose");
xmlwriter_end_element($w);

// simpler version
xmlwriter_write_element_ns($w,"dc","subject",
	"http://purl.org/dc/elements/1.1/", "Simple");

echo '<pre>'.htmlentities(xmlwriter_output_memory($w)).'</pre>';
?>