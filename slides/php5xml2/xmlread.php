<?php
// create XMLReader object
$reader = new XMLReader();
// open XML file, to open strings use $reader->XML($string)
$reader->open(dirname(__FILE__) . '/thedata.xml');

$id = $link = $description = $title = $curval = '';

// loop through the elements
while ($reader->read()) {
	switch ($reader->nodeType) {
		case XMLREADER_ELEMENT: /* fetch element name */
			$curval = $reader->localName;
			/* check for attributes */
			if ($reader->hasAttributes) {
				/* move to 1st attribute */
				$attr = $reader->moveToFirstAttribute();
				while ($attr) {
					${$reader->name} = $reader->value;
					/* move to next attribute */
					$attr = $reader->moveToNextAttribute();
				}
			}
			break;

		case XMLREADER_TEXT: /* fetch element value */
			${$curval} = $reader->value;
			break;

		case XMLREADER_END_ELEMENT: /* element end */
			/* if end of <item>, print info */
			if ($reader->localName == 'item') {
				echo "Title: <a href='{$link}'>{$title}</a><br />
					Body: {$description}<hr />";
			}
			break;
	}
}
?>