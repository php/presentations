<?php
function most_similar(&$context, $string, $source_str)
{ 
	/* Calculate the similarity between two strings */
	$sim = similar_text($string, $source_str);
	if (empty($context) || $sim > $context['sim']) {
		$context = array('sim'=>$sim, 'title'=>$string);
	}
}

function most_similar_finalize(&$context)
{
	return $context['title'];
}

chdir(dirname(__FILE__));

$db = new sqlite_db("./db2.sqlite");

/*
 * sqlite function name 
 * PHP logic function
 * PHP finalize function
 * number of arguments not counting the context (optional)
 */
$db->create_aggregate('similar_text', 'most_similar', 'most_similar_finalize', 2);

$title = 'mesg #2';

echo "Most Similar title to '{$title}' according to similar_text() is: ";
echo $db->single_query("SELECT similar_text(title, '{$title}') FROM messages");
echo "<br />\n";
?>