<?php
// a more general XML parser

require_once 'PEAR.php';

class XMLAttribute {
	
	var $name;
	var $value = null;

	function &XMLAttribute($name, $value) {
		$this->name = $name;
		$this->value = $value;
	}

	function get() {
		return $this->value;
	}

	function toString() {
		return "[{$this->name} = {$this->value}]";
	}
}

class XMLNode {

	var $name;
	var $attributes = array();
	var $content;
	var $children;
	var $parent = null;

	function &XMLNode($name, $attributes) {
		$this->name = $name;
		foreach ($attributes as $name=>$value) {
			$this->attributes[$name] = 
				new XMLAttribute($name, $value);
		}
		$this->children = array();
	}
	function setContent(&$data) {
		$this->content = $data;
	}

	function &addChild(&$child) {
		$child->setParent($this);
		$this->children[] =& $child;
		return $this->children[count($this->children) - 1];	
	}

	function setParent(&$parent) {
		$this->parent =& $parent;
	}

	function &getName() {
		return $this->name;
	}

	function &getParent() {
		return $this->parent;
	}

	function &getAttribute($attname) {
		if (array_keys_exists($attname, $this->attributes)) {
			return $this->attributes[$attname];
		}
	}

	function &getAttributes() {
		return $this->attributes;
	}
	
	function &getChildren() {
		return $this->children;
	}

	function &getContent() {
		return $this->content;
	}

	function toString($level=1) {
		$sep = '  ';
		$out = str_repeat($sep, $level - 1).
				"tag :: ".$this->getName()."\n";
        $out .= str_repeat($sep, $level)."attributes ::\n";
		foreach ($this->getAttributes() as $attr) {
			$out .= str_repeat($sep, $level + 1).
					$attr->toString()."\n";
		}
        $out .= str_repeat($sep, $level).
				"content :: ".$this->getContent()."\n";
		foreach ($this->getChildren() as $child) {
			$out .= $child->toString($level + 1);
		}
		return $out;
	}
}

class XMLParser {

	var $parser;
	var $root;
	var $last = null;

	function XMLParser() {
		$this->parser = xml_parser_create();
		xml_set_object($this->parser, $this);
		xml_set_element_handler($this->parser, 'start', 'end');
		xml_set_character_data_handler($this->parser, 'cdata');
	}

	function parse($xml) {
		xml_parse($this->parser, $xml);
	}

	function start($parser, $name, $attrs) {
		$tag = trim($name);
		$node = new XMLNode($tag, $attrs);
		if (is_null($this->last)) {
			$this->root =& $node;
		} else {
			$this->last->addChild(&$node);
		}
		$this->last =& $node;
		
	}

	function end($parser, $name) {
		$this->last =& $this->last->parent;
	}

	function cdata($parser, $data) {
		if (!is_null($this->last))
			$this->last->setContent(trim($data));
	}

	function &getRoot() {
		return $this->root;
	}
}

$xml_file = 'presentations/slides/sdphp/data/sdphp_talk2.xml';
$xmldoc = implode('', file($xml_file));

$parser = new XMLParser();
$parser->parse($xmldoc);
$root = $parser->getRoot();

echo "<pre>\n".$root->toString()."</pre>\n";

?> 
