<?php

/*************************************************************************
   Author  : Efe - The Bugi Team
   Date    : 01/04/2002
   Version : 2.1
   
   Copyright information:
      Bugi Template is free. You may modify or change it as you wish.
   The Bugi Team is not responsible for any damage or misuse that Bugi
   Template might cause.  Bugi Template is free as long as you keep this
   Copyright information intact.  Please give credit to were it belongs.
   For more information and up to date versions and documentation visit:

   http://www.bugi.biz

   The Bugi Team

   Change log:

   17/03/2002: Initial release 1.0b
   
   25/03/2002: Second release 2.0
               - Removed Keep build and print mode, added:
                 l : leave as is mode
                 c : comment mode
               
               - Added block parent variable, speeding up
                 block parsing and assigning
       
               - Removed most recursive calls to iterative 

               - Speed improvment in block and variable assigning

               - Changed file loading to fread

               - Changed Template name to 'bugiTemplate'

               - Constructor name changed to 'bugiTemplate'

               - Changed class filename to bugitemplate.class.php

   1/04/2002: Bugi Template 2.1
               - Changed preg_replace to str_replace (speed enhancement)

               - Fixed global variable bug in loops

               - Organized code
            
               - Speed up variable assignment


   Questions?
        Email me Efe (pronounced 'Ae-fae' ) at efe@bugi.biz if
   you have any questions or bug reports.

*************************************************************************/


class bugiTemplate 
{

   /*** Template directory ***/
   var $tdir        = '';

   /*** Contains substitue variables ***/
   var $tvar        = array();

   /*** Contains parsed blocks ***/
   var $tblockvar   = array();

   /*** Contains ignored variables ***/
   var $tignorevar   = array();

   /** Contains all template variable names and blocks ***/
   var $tvar_all   = array();

   /*** Contains loaded files ***/
   var $tfile       = array();   
   
   /*** Contains unknown variables ***/
   var $tunknown    = array();

   /*** Contains block and variable parents (if any) ***/
   var $tparent    = array();


   /******************** Public Members *********************/

   function bugiTemplate ($dir = '.')
   {
      if (!is_dir($dir)) {
         die ("Template(): Invalid template directory '$tstring'");
      }

      $this->tdir  = $dir; 
   }


   function tdestroy () {
      $this->var       = array();
      $this->blockvar  = array();
      $this->tfile     = array();   
      $this->tunknown  = array();   
      $this->tparent   = array();   
      $this->tvar_all  = array();   
      $this->dir       = '';
   }


   function tset_template ($tstring = '')
   {
      if (!is_array($tstring)) {
            die("tset_template(): '$tstring' is not an array");
      }
   
      reset($tstring);
      foreach ($tstring as $handle => $file) {
         $this->tload($this->tdir . "/$file", $handle);

         preg_match_all('#<%\s*[^E]*[START]*\s*(\w+)\s*%>#Usm', $this->tfile[$handle], $this->tvar_all[$handle]);

         if (strpos($this->tfile[$handle], 'START')) {
            $this->tblock($handle);
         }
      }

   }


   function tclear_var ($tstring = '') 
   {
      if (!is_string($tstring)) {
         die("tclear_var(): '$tstring' is not a string");
      }

      $is_empty_var = $this->tvar[$tstring]; 
      $is_empty_blockvar = $this->tblockvar[$tstring]; 

      if (isset($is_empty_var) || isset($is_empty_blockvar)) {
          $this->tvar[$tstring] = '';
          $this->tblockvar[$tstring] = '';
      }
      else {
         die("tclear_var(): '$tstring' is not a valid var/block");
      }
   }


   function tignore_var ($tstring = '') 
   {
      if (!is_string($tstring)) {
         die("tignore_var(): '$tstring' is not a string");
      }

      $is_empty_var = $this->tvar[$tstring]; 
      $is_empty_blockvar = $this->tblockvar[$tstring]; 

      if (isset($is_empty_var) || isset($is_empty_blockvar)) {
          unset($this->tvar[$tstring]);
          unset($this->tblockvar[$tstring]);
      }
      else {
         die("tignore_var(): '$tstring' is not a valid var/block");
      }
   }


   function tassign_var ($tstring = '', $mode = '')
   {
      if (!is_array($tstring)) {
            die("tassign_var(): '$tstring' is not an array");
      }

      if (empty($mode)) {
         $this->tvar = array_merge($this->tvar, $tstring);
      }
      elseif ($mode == 'r') {
         $this->tvar = array_merge($this->tvar, $tstring);
      }
      elseif ($mode == 'a') {
         reset($tstring);
         foreach ($tstring as $h => $v) {
            $this->tvar[$h] .= $v;
         }
      }
      else {
         die("tassign_var(): Invalid mode '$mode'");
      }

   }


   function tassign_blockvar ($tstring, $mode = '')
   {
       if (is_string($tstring)) {
         unset($code);
         $code = $this->tblockvar[$tstring];
         $code = $this->treplace_var($code);
         if (empty($code)) {
            die("tassign_blockvar(): Invalid block '$tstring'");
         }

         switch ($mode) {
            case 'r':      
               $this->tvar[$tstring] = $code;
               break;

            case '' :
            case 'a':      
               $this->tvar[$tstring] .= $code;
            break;
            default :
               die("tassign_blockvar(): Invalid mode '$mode'");
         }
         return true;
      }

      reset($tstring);
      foreach ($tstring as $key => $val) {
         $parent = $this->tparent[$key];
         if(!isset($code[$parent])) {
            $code[$parent] = $this->tblockvar[$parent];  
         }

         $code[$parent] = preg_replace("#<%\s*$key\s*%>#", $val, $code[$parent]);
      }

      reset($code);
      if (empty($mode)) {
         foreach ($code as $h => $v) {
            @$this->tvar[$h] .= $v;
         }
      }
      elseif ($mode == 'a') {
         foreach ($code as $h => $v) {
            $this->tvar[$h] .= $v;
         }
      }
      elseif ($mode == 'r') {
        $this->tvar = array_merge($this->tvar, $code);
      }
      else {
         die("tassign_blockvar(): Invalid mode '$mode'");
      }

   }


   function tbuild ($template, $mode = '') 
   {
      $final_code = $this->tfile[$template];

      reset($this->tvar_all[$template][1]);
      foreach ($this->tvar_all[$template][1] as $index => $handle) {
         if (isset($this->tvar[$handle])) {
            $final_code = str_replace($this->tvar_all[$template][0][$index], $this->tvar[$handle], $final_code);
            continue;
         } 
         elseif (isset($this->tblockvar[$handle])) {
            $final_code = str_replace($this->tvar_all[$template][0][$index], $this->tblockvar[$handle], $final_code);
            continue;
         }
         continue;
      }  

       if (empty($mode)) {
          return preg_replace('#<%\s*\w+\s*%>#', '', $final_code);
       } 
       elseif ($mode == 'd') {
          return preg_replace('#<%\s*\w+\s*%>#', '', $final_code);
       }
       elseif ($mode == 'l') {
          return $final_code;
       }
       elseif ($mode == 'c') {
          return preg_replace('#<%\s*(\w+)\s*%>#', '<!-- ' . $template . ' Unknown: <%\\1%> -->', $final_code);
       } 
       elseif ($mode == 's') {

          preg_match_all('#<%\s*(\w+)\s*%>#Usm', $final_code, $result);
          $result = array_unique($result[1]);

          foreach ($result as $index => $unknown) {
             print "<b>$template</b> Unknown ($index): &lt;%$unknown%&gt;<br>\n";
          } 

          return preg_replace('#<%\s*\w+\s*%>#Usm', '', $final_code);
       } 
       else {
         die("tbuild(): Invalid build mode '$mode'");
       }
   }


   function tprint ($tstring, $mode = '') 
   {
      print $this->tbuild($tstring, $mode);        
   }


   function tstart_time() 
   {
      $start_t = microtime();
      $start_t = explode(' ',$start_t);
      $start_t = $start_t[1] + $start_t[0];

      return $start_t;
   }


   function tend_time($tstring) 
   {
      $end_t = microtime();
      $end_t = explode(' ',$end_t);
      $end_t = $end_t[1] + $end_t[0];
      $total_t = ($end_t - $tstring);
      $total_t = sprintf('%.6f', $total_t);

      return $total_t;
   }

   /******************** Private Members *********************/

   function tblock ($handle)
   {
      $tstring     = $this->tfile[$handle];  
      $reg_replace = '#(<%\s*START\s+)(\w+)(\s*%>).*<%\s*END\s+\\2\s*%>#Usm';
      preg_match_all('#<%\s*START\s+(\w+)\s*%>#Usm', $tstring, $result);

      reset($result[1]);   
      foreach ($result[1] as $index => $block) {
      
         $reg_code = "#<%\s*START\s+$block\s*%>(.*)<%\s*END\s+$block\s*%>#Usm";
         preg_match($reg_code, $tstring, $code);
         $this->tblockvar[$block] = ltrim($code[1]);

         if (strpos($this->tblockvar[$block], 'START')) {
            $this->tblockvar[$block] = preg_replace($reg_replace, '\\1\\2\\3', $this->tblockvar[$block]);
         }

         if (preg_match_all('#<%\s*(\w+)\s*%>#Usm', $this->tblockvar[$block], $parents)) {
            $parents = array_unique($parents[1]);

            reset($parents);
            foreach ($parents as $val)  {
               $this->tparent[$val] = $block;         
            }
         }

      }

      $this->tfile[$handle] = preg_replace($reg_replace, '\\1\\2\\3', $tstring);
   }


   function tload ($file = '', $handle) 
   {
      $fp = fopen($file, 'r');
      if(!$fp) {
         die ("tload(): Template file '$file' does not exist");
      }

      $this->tfile[$handle] = fread($fp, filesize($file));
      fclose($fp);

      return true;
   }


   function treplace_var ($tstring) 
   {
      $regexp = "#<%\s*(\w+)\s*%>#Usm";
      preg_match_all($regexp, $tstring, $result);
      $result[1] = array_unique($result[1]);
      $block_array = array_keys($this->tblockvar);
      $count = count(array_intersect($block_array, $result[1]));

      if ($count == 0) {
         return $tstring;
      }

      foreach ($result[1] as $handle) {
         $tstring = preg_replace("#<%\s*$handle\s*%>#", $this->tvar[$handle], $tstring);
      }  

      return $this->treplace_var($tstring);
   }
   
} // end Template Class
?>
