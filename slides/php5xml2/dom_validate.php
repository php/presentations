<?php
$dom = new domDocument;
$dom->load(dirname(__FILE__) . "/thedata.xml");
if (@$dom->validate()) {
	echo "Document is valid";
} else {
	echo "Document is invalid";
}
?>