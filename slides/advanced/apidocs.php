<?php

/**
 * A simple class that describes a Thneed
 *
 * @author Sterling Hughes <sterling@php.net>
 * @author Dr. Suess
 * @since  The Lorax v1
 * @access public
 */
class Thneed 
{
	// {{{ isLorax()

	/**
	 * Detect whether or not a name equals the lorax
	 *
	 * @param string The name to evaluate
	 *
	 * @return boolean True if the name is the Lorax, 
	 *                 False otherwise
	 */
	function isLorax($name) {
		$name = strtolower($name);
		return stristr($name, 'lorax');
	}

	// }}}
	// {{{ getReasoning()

	/**
	 * Get the reason why thneeds must be created.  
	 *
	 * @param string Your name
	 *
	 * @return string The reason!
	 * @access public 
	 */
	function getReasoning($name) 
	{
		if ($this->isLorax($name)) {
			return 'piss off you bloody bugger';
		} else {
			return 'because thneeds are what everyone needs!';
		}
	}

	// }}}
}
