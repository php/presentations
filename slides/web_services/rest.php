<?php
// Make a request, passing required information via GET
$xml = simplexml_load_file(
	"http://xml.amazon.com/onca/xml3?KeywordSearch=PHP"
);
$books = $xml->Details;
foreach ($books as $book) {
	echo $book->ProductName.' '.$book->OurPrice."<br />\n";
}
?>