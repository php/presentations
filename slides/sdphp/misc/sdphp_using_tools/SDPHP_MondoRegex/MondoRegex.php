<?php

/**
 * Class to apply an array of regular expressions to an array of items. 
 * Supports first match only (as in preg_match) and matching all possibilities
 * (as in preg_match_all), as well as retrieval of results from a named 
 * regular expression pattern.
 *
 * Example of use:
 *
 * <pre>
 * require_once 'SDPHP/MondoRegex.php';
 * 
 * $reList = array (
 * 			'funcs' => "/function (\w+)\s?\(/",
 * 			'assign' => "/\s+([^\s]+)\s+=\s+(.+);/",
 * 			'varname' => "/([$]\w+[-]*[>]*\w+)/"
 * 			);
 * $inputList = file("/path/to/script.php");
 * $mondo  = new MondoRegex($reList);
 * echo "Using match\n--------------\n";
 * $mondo->match($inputList);
 * print_r($mondo->getMatches());
 * echo "\nUsing match_all\n--------------\n";
 * $mondo->matchAll($inputList);
 * print_r($mondo->getMatches());
 * echo "\nGetting only the matches to the 'funcs' regular expression\n";
 * echo "----------------------------------------------------------\n";
 * print_r($mondo->getMatchesFor('funcs'));
 * </pre>
 *
 * License: PHP License 2.0 or later
 *
 * Last Updated: Thursday 2003-06-05 20:01:49 PDT.
 *
 * @package MondoRegex
 * @version 0.1.0
 * @copyright Jesus M. Castagnetto, 2003
 * @author Jesus M. Castagnetto
 */
class MondoRegex {/*{{{*/

    /**
     * List of regular expressions
     *
     * @var array
     * @access private
     */
	var $_reList = array();

    /**
     * List of matches
     *
     * @var array
     * @access private
     */
	var $_matchList = array();


   function foo() {/*{{{*/
   }/*}}}*/

    /**
     * Class constructor
     *
     * @param optional array $reList associative array of regular expressions
     * @return MondoRegex object
     * @access public
     */
	function MondoRegex($reList = "")/*{{{*/
	{
		if (!empty($reList) && is_array($reList)) {
			$this->setRegexList($reList);
        }
	}/*}}}*/

    /**
     * Sets the regular expression list
     *
     * @param optional array $reList associative array of regular expressions
     * @return void
     * @access public
     */
    function setRegexList($reList) /*{{{*/
    {
        if (is_array($reList)) {
            $this->_reList = $reList;
        }
    }/*}}}*/

    /**
     * Do a simple matching on the input
     *
     * @param array $inputList array of strings
     * @return boolean true on success, false otherwise
     * @access public
     */
	function match($inputList)/*{{{*/
	{
		return $this->_reMatch("preg_match", $inputList);
	}/*}}}*/

    /**
     * Perform all possible matches on the input
     *
     * @param array $inputList array of strings
     * @return boolean true on success, false otherwise
     * @access public
     */
	function matchAll($inputList)/*{{{*/
	{
		return $this->_reMatch("preg_match_all", $inputList);
	}/*}}}*/

    /**
     * Retrieve all matches from the last operation
     *
     * @return array of matches
     * @access public
     */
	function getMatches()/*{{{*/
	{
		return $this->_matchList;
	}/*}}}*/

    /**
     * Retrieve the matches for the named regular expression
     * 
     * @param string $reName the name of the regular expression
     * @return array|false an array if the name exists, false otherwise
     */
	function getMatchesForKey($reName)/*{{{*/
	{
		if (in_array($reName,array_keys($this->_matchList))) {
			return $this->_matchList[$reName];
        } else {
			return false;
        }
	}/*}}}*/

    /**
     * Retrieve the named regular expressions that gave a match
     *
     * @return array|false an array of keys on success, false otherwise
     * @access public
     */
	function getMatchKeys()/*{{{*/
	{
        if (empty($this->_matchList)) {
            return false;
        } else {
            return array_keys($this->_matchList);
        }
	}/*}}}*/

    /**
     * Utility function to perform the regular expression matching
     *
     * @param string $reFunc regular expression function to use
     * @param array $inputList array of input strings
     * @return boolean true on success, false otherwise
     * @access private
     */
	function _reMatch($reFunc, $inputList)/*{{{*/
	{
		$this->_matchList = array();

		if (empty($this->_reList) || !array($inputList)) {
            return false;
        }

		foreach ($this->_reList as $reName=>$reStr) {
			foreach ($inputList as $input) {
				if ($reFunc($reStr, $input, &$hits)) {
					if (!empty($hits)) {
						$this->_matchList[$reName][] = $hits;
					}
				}
			}
		}
		return !empty($this->_matchList);
	}/*}}}*/

}/*}}}*/

?>
