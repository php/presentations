<?php
$books = simplexml_load_file('presentations/slides/php5intro/book.xml');

foreach ($books->book as $book) {
	echo "{$book->title} was written by {$book->author}<br>\n";
}
?>
