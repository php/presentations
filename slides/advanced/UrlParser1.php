<?php
class UrlParser {
  private $urls;
  private $titles;

  function SearchText($text) {
    preg_match_all(
	  '@<a.+href=\"([^"]+)\">(.+)</a>@ix',
      $text, $matches);
    
	$this->urls = $matches[1];
    $this->titles = $matches[2];
		
    unset($matches);
  }

  function GetUrl($index) {
    return $this->urls[$index];
  }

  function GetTitle($index) {
    return $this->titles[$index];
  }
}
?>
