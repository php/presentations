<?php
$books = simplexml_load_file('book.xml');

foreach ($books->book as $book) {
	echo "{$book->title} was written by {$book->author}<br>\n";
}
?>
