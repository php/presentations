<?php
require_once "Text/Word.inc";

class WordFactory {
  static $objects;
  function Word($name) {
	$nobject = &self::$objects['Word'][$name];
	
    if (!$nobject) {
      $nobject = new Word($name);
    }

    return $nobject;
  }
}
?>
