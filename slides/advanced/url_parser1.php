<?php
class url_parser {
	public $url_list;

	function search_document ($document) {
		preg_match_all('@<a.*?href=\"([^"]+)\">[^<]*</a>@ix', 
			$document, $matches);
		$this->url_list = $matches[1];
		unset($matches);
	}
}
?>
