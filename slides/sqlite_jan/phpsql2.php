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

	$db = sqlite_open(dirname(__FILE__)."/db2.sqlite");

	/* bool sqlite_create_aggregate (resource dbhandle, string function_name, mixed step_func, mixed finalize_func [, int num_args]) */
	sqlite_create_aggregate($db, 'similar_text', 'most_similar', 'most_similar_finalize', 2);

	$title = 'mesg #2';

	echo "Most Similar title to '{$title}' according to similar_text() is: ";
	echo sqlite_single_query("SELECT similar_text(title, '{$title}') FROM messages", $db);
	echo "<br />\n";
?>