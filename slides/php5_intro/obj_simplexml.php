<?php
$xml = '<articles>
<article id="1">
	<title>Something Happened</title>
	<author>Random Person</author>
</article>
<article id="2">
	<title>Something Else Happened</title>
	<author>Different Person</author>
</article>
</articles>';

/* load & parse XML string */
$art = simplexml_load_string($xml);
foreach ($art as $article) {
	echo 'Id: ' . $article['id'];
	echo 'Title: ' . $article->title;
	echo 'Author: ' . $article->author;
}
?>