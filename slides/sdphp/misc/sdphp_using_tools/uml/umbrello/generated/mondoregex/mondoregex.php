<?php
// vim: set expandtab tabstop=4 softtabstop=4 shiftwidth=4:
// +----------------------------------------------------------------------+
// | PHP Version 4                                                        |
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2003 The PHP Group                                |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.02 of the PHP license,      |
// | that is bundled with this package in the file LICENSE, and is        |
// | available at through the world-wide-web at                           |
// | http://www.php.net/license/2_02.txt.                                 |
// | If you did not receive a copy of the PHP license and are unable to   |
// | obtain it through the world-wide-web, please send a note to          |
// | license@php.net so we can mail you a copy immediately.               |
// +----------------------------------------------------------------------+
// | Created: Thu Jun 5 21:55:30 2003
// | Author:  Jesus M. Castagnetto <jmcastagnetto@php.net>
// +----------------------------------------------------------------------+
//
// $Id$
//

include_once 'PEAR.php';

/**
 * Project: SDPHP
 * 
 * @package MondoRegex
 */




// +X2C Class 2 :MondoRegex
/**
 * Our superduper regular expression class
 *
 * @access public
 */
class MondoRegex {
  /**
   * @var    array $_reList
   * @access private
   */
  var $__reList;

  /**
   * Array of matches
   *
   * @var    array $_matchList
   * @access private
   */
  var $__matchList;

  // ~X2C

  // +X2C Operation 5
  /**
   * @param  array $reList Optional array of regular expressions
   *
   * @return MondoRegex
   * @access public
   */
  function MondoRegex($reList) // ~X2C
  {
    not implemented
  }
  // -X2C

  // +X2C Operation 6
  /**
   * @param  array $reList array of regular expressions
   *
   * @return bool
   * @access public
   */
  function setRegexList($reList) // ~X2C
  {
    not implemented
  }
  // -X2C

  // +X2C Operation 7
  /**
   * @param  array $inputList array of strings
   *
   * @return bool
   * @access public
   */
  function match($inputList) // ~X2C
  {
    not implemented
  }
  // -X2C

  // +X2C Operation 8
  /**
   * @param  array $inputList array of strings
   *
   * @return bool
   * @access public
   */
  function matchAll($inputList) // ~X2C
  {
    not implemented
  }
  // -X2C

  // +X2C Operation 9
  /**
   * @return array
   * @access public
   */
  function getMatches() // ~X2C
  {
    not implemented
  }
  // -X2C

  // +X2C Operation 10
  /**
   * @param  string $reName regular expression key
   *
   * @return array
   * @access public
   */
  function getMatchesForKey($reName) // ~X2C
  {
    not implemented
  }
  // -X2C

  // +X2C Operation 11
  /**
   * @return array
   * @access public
   */
  function getMatchKeys() // ~X2C
  {
    not implemented
  }
  // -X2C

  // +X2C Operation 12
  /**
   * @param  string $reFunc name of regex function
   * @param  array $inputList array of strings
   *
   * @return bool
   * @access private
   */
  function __reMatch($reFunc, $inputList) // ~X2C
  {
    not implemented
  }
  // -X2C

} // -X2C Class :MondoRegex
?>