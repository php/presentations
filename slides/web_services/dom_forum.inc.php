<?php
class forum extends domDocument {
	function __construct() {
		// domDocument constructor must be called to 
		// create the document.
		parent::__construct();
	}
                                
	// parameters: title, link, description, id
	function add_entry()
	{
		$elements = array('title','link','description');
		$args = func_get_args();

		// create a new node 
		$item = $this->createElement("item");

		// assign id to our new node
		$item->setAttribute("id", array_pop($args));

		// create elements for the new node
		foreach ($elements as $element) {
			// create element
			${$element} = $this->createElement($element);

			// assign value to new element
			${$element}->appendChild(
				$this->createTextNode(array_shift($args))
			);

			// append element to the node
			$item->appendChild(${$element});
		}

		// append new node to existing document
		$this->documentElement->appendChild($item);
	}
}
?>