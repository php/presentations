<?php
function most_similar(&$context, $string, $source_str)
{ 
	// decode the data retrieved from the database
	$string = sqlite_udf_decode_binary($string);

	$sim = similar_text($string, $source_str);
	if (empty($context) || $sim > $context['sim']) {
		$context = array('sim'=>$sim, 'title'=>$string);
	}
}

function most_similar_finalize(&$context)
{
	// encode the data so that it can be safely retrieved
	return sqlite_udf_encode_binary($context['title']);
}

chdir(dirname(__FILE__));

$db = new sqlite_db("./db2.sqlite");

$db->create_aggregate('similar_text', 'most_similar', 'most_similar_finalize', 2);

echo "Most Similar title to 'mesg #2' according to similar_text() is: ";
echo $db->single_query("SELECT similar_text(title, 'mesg #2') FROM messages");
echo "<br />\n";
?>
