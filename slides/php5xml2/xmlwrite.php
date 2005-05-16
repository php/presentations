<?php
// begin a new memory based XML document
$w = xmlwriter_open_memory();

// set indenting (makes output readable)
xmlwriter_set_indent($w, TRUE);

xmlwriter_start_document($w); // start document

xmlwriter_start_element($w, "test"); // start <test>

xmlwriter_start_element($w, "example"); // start node <example>

xmlwriter_write_attribute($w, "id", 1); // add attribute to example

xmlwriter_start_element($w, "data"); // add node <data>
xmlwriter_text($w, "Some text"); // add content to node
xmlwriter_end_element($w); // close node

// close all open nodes
xmlwriter_end_element($w); xmlwriter_end_element($w);

// end document
xmlwriter_end_document($w);
    
// output generated XML
echo '<pre>'.htmlentities(xmlwriter_output_memory($w)).'</pre>';
?>