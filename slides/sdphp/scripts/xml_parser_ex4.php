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

class Transformer {

	var $root;

	function Transformer($root) {
		$this->root = $root;
	}

	function toHTML() {
		return $this->_toTable($this->root);
	}

	function _toTable($node) {
		$out = "<table border='1' cellspacing='0' cellpadding='5' width='100%'>\n".
				"<tr bgcolor='#ffaaaa' align='center'>\n".
				"<th colspan='2' >".$node->name."</th>\n</tr>\n<tr valign='top'>\n".
				"<th bgcolor='#ffccff' width='20%'>Attributes</th>\n".
				"<td bgcolor='#ffffff'>\n";
		if (empty($node->attributes)) {
			$out .= "&nbsp;\n";
		} else {
			foreach ($node->attributes as $attr) {
				$out .= "<b>{$attr->name}</b> = {$attr->value}<br>\n";
			}
		}
		$out .= "</td>\n</tr>\n<tr>\n<th bgcolor='#ffccff' width='20%'>Content:</th>\n".
				"<td bgcolor='#ffffff'>";
		$out .= (trim($node->content)) ? $node->content : '&nbsp;';
		$out .= "</td>\n</tr>\n<tr valign='top'>\n".
				"<th bgcolor='#ffccff' width='20%'>ChildNodes:</th>\n".
				"<td bgcolor='#ffffff'>\n";
		foreach ($node->children as $child) {
			$out .= $this->_toTable($child)."\n";
		}
		$out .= "</td>\n</tr>\n</table>\n";
		return $out;
	}
}


$xml_file = 'presentations/slides/sdphp/data/sdphp_talks.xml';
//$xml_file = '../data/sdphp_talks.xml';
$xmldoc = implode('', file($xml_file));

$parser = new XMLParser();
$parser->parse($xmldoc);
$root = $parser->getRoot();

$transf = new Transformer($root);

echo $transf->toHTML();

?> 
