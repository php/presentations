<?php
function w_start_tag($x, $tag, $attr)
{
	global $w;

	switch ($tag) {
	case 'WISHLIST':
		$w->base = $attr['URI'];
		break;
	case 'ITEM':
		$item = new Wishlist_Item();
		$item->id = $attr['ID'];
		array_push($w->items, $item);

		$GLOBALS['item'] = $item;
		break;
	default:
		$GLOBALS['curtag'] = $tag;
		break;
	}
}

function w_end_tag($x, $tag)
{
	$GLOBALS['curtag'] = null;
}

function w_data($x, $data)
{
	global $curtag;
	global $item;

	$data = trim($data);
	
	switch ($curtag) {
	case 'TITLE':
		$item->title .= $data;
		break;
	case 'AUTHOR':
		$item->author .= $data;
		break;
	case 'DESCRIPTION':
		$item->desc .= $data;
		break;
	}
}
?>
