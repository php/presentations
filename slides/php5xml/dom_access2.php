<?php
$xmlstring = '<?xml version="1.0" ?>
<!DOCTYPE books [
<!ATTLIST book id ID #IMPLIED>
]>
<books>
	<book id="1">
        	<title>Book 1</title>
	</book>
        <book id="2">
        	<title>Book 2</title>
	</book>
</books>';
                                
$dom = new domDocument();
/* load XML from string */
$dom->loadXML($xmlstring);
/* get the node identified by id #2 */
$node = $dom->getElementById("2");

print trim($node->nodeValue);
?>