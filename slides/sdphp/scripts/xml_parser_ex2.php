<?php

require_once 'PEAR.php';

class Talk {

	var $elements;

	function Talk() {
		$this->elements = array();
	}
	
	function set($name, $value) {
		$this->elements[$name] = $value;
	}

	function get($name) {
		if (array_key_exists($name, $this->elements))
			return $this->elements[$name];
		else
			return PEAR::raiseError("Element $name no found");
	}

	function toString() {
		foreach ($this->elements as $key=>$value)
			printf("<i>%s</i> :: %s<br>\n", $key, $value);
	}
} // end of class Talk

class TalkParser {

	var $parser;
	var $ltag;
	var $lcontent;
	var $talk;

	function TalkParser() {
		$this->parser = xml_parser_create();
		xml_set_object($this->parser, $this);
		xml_set_element_handler($this->parser, 'start', 'end');
		xml_set_character_data_handler($this->parser, 'cdata');
		$this->ltag = $this->lcontent = '';
	}

	function parse($xml) {
		xml_parse($this->parser, $xml);
	}

	function start($parser, $name, $attrs) {
		if (strtolower($name) == 'talk') {
			$this->talk = new Talk();
		} else {
			$this->ltag = trim($name);
		}
	}

	function end($parser, $name) {
		if ($this->ltag != '') {
			$this->talk->set($name, $this->lcontent);
			$this->ltag = $this->lcontent = '';
		}
	}

	function cdata($parser, $data) {
		$this->lcontent = trim($data);
	}

	function getTalk() {
		return $this->talk;
	}
} // end of class TalkParser

$xml_file = 'presentations/slides/sdphp/data/sdphp_talk.xml';
$xmldoc = implode('', file($xml_file));

$parser = new TalkParser();
$parser->parse($xmldoc);
$talk = $parser->getTalk();

$talk->toString();

?> 
