<?php
$reader = new XMLReader();
/* load xml document as a string */
$reader->XML(file_get_contents(dirname(__FILE__) . '/thedata.xml'));
/* tell the parser to perform syntax validation */
$reader->setParserProperty(XMLREADER_VALIDATE, TRUE);

// loop until end of document
// @ blocks the parser errors (missing DTD in this case)
while (@$reader->read());

echo "XML document is: " . ($reader->isValid() ? '' : ' not') . " valid.";
?>