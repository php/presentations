<?php
require_once('XML/Parser.php');

class Wishlist_Item {
	public $id;
	public $title;
	public $author;
	public $desc;
}

class Wishlist extends XML_Parser {
	private $curtag;
	private $curitem;

	public $items;
	public $base;

	function __construct($filename) {
		$this->items = array();
	
		$this->XML_Parser();
		$this->setMode('event');
		$this->setInputFile($filename);
	}

	function startHandler($x, 
						  $tag, 
						  $attr) {
		switch ($tag) {
		case 'WISHLIST':
			$this->base = $attr['URI'];
			break;
		case 'ITEM':
			$item = new Wishlist_Item();
			$item->id = $attr['ID'];
			array_push($this->items, 
					   $item);

			$this->curitem = $item;
			break;
		default:
			$this->curtag = $tag;
			break;
		}
	}

	function endHandler($x, $tag) {
		$this->curtag = null;
	}

	function cdataHandler($x, $data) {
		$data = trim($data);

		$item = $this->curitem;

		switch ($this->curtag) {
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
}
?>
