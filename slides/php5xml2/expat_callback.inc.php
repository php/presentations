<?php

class entry {
	public $title, $id, $link, $description;

	// temporary variable used to indicate current tag
	public $cur_tag;
}

function w_start_tag($x, $tag, $attr)
{
	global $w;
    
	switch ($tag) {
		case 'ITEM':
			$w = new entry;
			$w->id = $attr['ID'];
			break;
		case 'TITLE':
		case 'LINK':
		case 'DESCRIPTION':
			$w->cur_tag = $tag;
			break;
	}
}

function w_end_tag($x, $tag)
{
	global $w;
	if ($tag == 'DESCRIPTION') {
		echo "Title: <a href='{$w->link}'>{$w->title}</a><br />\n
			Body: {$w->description}<hr />";
		unset($w);
	}
}
                                                                                                    
function w_data($x, $data)
{
	global $w;

	// move along, nothing to see here
	if (!is_object($w)) return;

	switch ($w->cur_tag) {
		case 'TITLE':
		case 'LINK':
		case 'DESCRIPTION':
			$w->{strtolower($w->cur_tag)} .= trim($data);
			break;
        }
}
?>