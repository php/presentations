<?php
/***************************************
** Title........: Template class
** Filename.....: class.template.inc
** Author.......: Richard Heyes
** Version......: 1.4
** Notes........:
** Last changed.: 14 July 2001
** Last change..: Added if conditional syntax
***************************************/

	class template{

		var $var_names	= array();
		var $files		= array();
		var $start		= '{';
		var $end		= '}';

	/***************************************
	** Function to load a template into
	** the class.
	***************************************/
		function load_file($file_id, $filename){
			$this->files[$file_id] = fread($fp = fopen($filename, 'r'), filesize($filename));
			fclose($fp);
		}


	/***************************************
	** Function to load a template into
	** the class.
	***************************************/
		function set_identifiers($start, $end){
			$this->start = $start;
			$this->end = $end;
		}

	/***************************************
	** This function is used only by the
	** register() method, for going through
	** arays and extracting the values.
	***************************************/
		function traverse_array($file_id, $array){
			while(list(,$value) = each($array)){
				if(is_array($value)) $this->traverse_array($file_id, $value);
				else $this->var_names[$file_id][] = $value;
			}
		}

	/***************************************
	** Function to register a variable(s).
	***************************************/
		function register($file_id, $var_name){
			if(is_array($var_name)){
				$this->traverse_array($file_id, $var_name);
			}elseif($var_name != ''){
				if(is_long(strpos($var_name, ',')) == TRUE){
					$var_name = explode(',', $var_name);
					for(reset($var_name); $current = current($var_name); next($var_name)) $this->var_names[$file_id][] = trim($current);
				}else{
					$this->var_names[$file_id][] = $var_name;
				}
			}
		}

	/***************************************
	** Function to include another file.
	** eg. A header/footer.
	***************************************/
		function include_file($file_id, $filename){
			if(file_exists($filename)){
				$include = fread($fp = fopen($filename, 'r'), filesize($filename));
				fclose($fp);
			}else $include = '[ERROR: "'.$filename.'" does not exist.]';

			$tag = substr($this->files[$file_id], strpos(strtolower($this->files[$file_id]), '<include filename="'.$filename.'">'), strlen('<include filename="'.$filename.'">'));
			$this->files[$file_id] = str_replace($tag, $include, $this->files[$file_id]);
		}

	/***************************************
	** Function for reading and parsing the
	** html file for normal variables. Also
	** now checks for include tags and if
	** necessary calls include_file()
	***************************************/
		function parse($file_id){
			$file_ids = explode(',', $file_id);
			for(reset($file_ids); $file_id = trim(current($file_ids)); next($file_ids)){
				while(is_long($pos = strpos(strtolower($this->files[$file_id]), '<include filename="'))){
					$pos += 19;
					$endpos = strpos($this->files[$file_id], '">', $pos);
					$filename = substr($this->files[$file_id], $pos, $endpos-$pos);
					$this->include_file($file_id, $filename);
				}

				if(isset($this->var_names[$file_id]) AND count($this->var_names[$file_id]) > 0){
					for($i=0; $i<count($this->var_names[$file_id]); $i++){
						$temp_var = $this->var_names[$file_id][$i];

						if(is_long(strpos($this->files[$file_id], $this->start.$temp_var.$this->end))){
							global $$temp_var;
							$this->files[$file_id] = str_replace($this->start.$temp_var.$this->end, $$temp_var, $this->files[$file_id]);

						}elseif(is_long(strpos($this->files[$file_id], $this->start.$temp_var.'()'.$this->end))){
							global $$temp_var;
							$arguments = array();
							for($i=0; $i<count($$temp_var); $i++) $arguments[] = ${$temp_var}[$i];
							if(count($arguments) > 0) $arguments = '"'.implode('", "', $arguments).'"'; else $arguments = '';
							eval('$output = '.$temp_var.'('.$arguments.');');
							$this->files[$file_id] = str_replace($this->start.$temp_var.'()'.$this->end, $output, $this->files[$file_id]);
						}
					}
				}
			}
		}

	/***************************************
	** Function for parsing an array.
	***************************************/
		function parse_loop($file_id, $array_name){
			global $$array_name;
			$loop_code = '';

			$start_pos = strpos(strtolower($this->files[$file_id]), '<loop name="'.$array_name.'">') + strlen('<loop name="'.$array_name.'">');
			$end_pos = strpos(strtolower($this->files[$file_id]), '</loop name="'.$array_name.'">');

			$loop_code = substr($this->files[$file_id], $start_pos, $end_pos-$start_pos);

			$start_tag = substr($this->files[$file_id], strpos(strtolower($this->files[$file_id]), '<loop name="'.$array_name.'">'),strlen('<loop name="'.$array_name.'">'));
			$end_tag = substr($this->files[$file_id], strpos(strtolower($this->files[$file_id]), '</loop name="'.$array_name.'">'),strlen('</loop name="'.$array_name.'">'));

			if($loop_code != ''){
				$new_code = '';
				for($i=0; $i<count($$array_name); $i++){
					$temp_code = $loop_code;
					while(list($key,) = each(${$array_name}[$i])){
						$temp_code = str_replace($this->start.$key.$this->end,${$array_name}[$i][$key], $temp_code);
					}
					$new_code .= $temp_code;
				}
				$this->files[$file_id] = str_replace($start_tag.$loop_code.$end_tag, $new_code, $this->files[$file_id]);
			}
		}

	/***************************************
	** Function for parsing a Mysql result
	** set.
	***************************************/
		function parse_sql($file_id, $result_name){
			global $$result_name;
			$loop_code = '';

			$start_pos = strpos(strtolower($this->files[$file_id]), '<loop name="'.$result_name.'">') + strlen('<loop name="'.$result_name.'">');
			$end_pos = strpos(strtolower($this->files[$file_id]), '</loop name="'.$result_name.'">');

			$loop_code = substr($this->files[$file_id], $start_pos, $end_pos-$start_pos);

			$start_tag = substr($this->files[$file_id], strpos(strtolower($this->files[$file_id]), '<loop name="'.$result_name.'">'),strlen('<loop name="'.$result_name.'">'));
			$end_tag = substr($this->files[$file_id], strpos(strtolower($this->files[$file_id]), '</loop name="'.$result_name.'">'),strlen('</loop name="'.$result_name.'">'));

			if($loop_code != ''){
				$new_code = '';
				$field_names = array();
				for($i=0; $i<mysql_num_fields($$result_name); $i++) $field_names[] = mysql_field_name($$result_name,$i);
				while($row_data = mysql_fetch_array($$result_name, MYSQL_ASSOC)){
					$temp_code = $loop_code;
					for($i=0; $i<count($field_names); $i++){
						$temp_code = str_replace($this->start.$field_names[$i].$this->end, $row_data[$field_names[$i]], $temp_code);
					}
					$new_code.= $temp_code;
				}
				$this->files[$file_id] = str_replace($start_tag.$loop_code.$end_tag, $new_code, $this->files[$file_id]);
			}
		}

	/***************************************
	** Function for parsing a Postgres result
	** set.
	***************************************/
		function parse_pgsql($file_id, $result_name){
			global $$result_name;
			$loop_code = '';

			$start_pos = strpos(strtolower($this->files[$file_id]), '<loop name="'.$result_name.'">') + strlen('<loop name="'.$result_name.'">');
			$end_pos = strpos(strtolower($this->files[$file_id]), '</loop name="'.$result_name.'">');

			$loop_code = substr($this->files[$file_id], $start_pos, $end_pos-$start_pos);

			$start_tag = substr($this->files[$file_id], strpos(strtolower($this->files[$file_id]), '<loop name="'.$result_name.'">'),strlen('<loop name="'.$result_name.'">'));
			$end_tag = substr($this->files[$file_id], strpos(strtolower($this->files[$file_id]), '</loop name="'.$result_name.'">'),strlen('</loop name="'.$result_name.'">'));

			if($loop_code != ''){
				$new_code = '';
				$field_names = array();
				for($i=0; $i<pg_numfields($$result_name); $i++) $field_names[] = pg_fieldname($$result_name,$i);
				for($i=0; $i<pg_numrows($$result_name) AND $row_data = pg_fetch_array($$result_name, $i); $i++){
					$temp_code = $loop_code;
					for($j=0; $j<count($field_names); $j++){
						$temp_code = str_replace($this->start.$field_names[$j].$this->end, $row_data[$field_names[$j]], $temp_code);
					}
					$new_code.= $temp_code;
				}
				$this->files[$file_id] = str_replace($start_tag.$loop_code.$end_tag, $new_code, $this->files[$file_id]);
			}
		}

        /***************************************
        ** Function looking for if blocks
        ** added by Stephan Lüderitz
        ***************************************/
               function parse_if($file_id, $array_name){

                   $var_names = explode(',', $array_name);

                   for($i=0; $i<count($var_names); $i++){
                        $if_code	= '';
                        $start_pos	= strpos(strtolower($this->files[$file_id]), '<if name="'.strtolower($var_names[$i]).'">') + strlen('<if name="'.strtolower($var_names[$i]).'">');
                        $end_pos	= strpos(strtolower($this->files[$file_id]), '</if name="'.strtolower($var_names[$i]).'">');

                        $if_code	= substr($this->files[$file_id], $start_pos, $end_pos-$start_pos);
                        $start_tag	= substr($this->files[$file_id], strpos(strtolower($this->files[$file_id]), '<if name="'.strtolower($var_names[$i]).'">'),strlen('<if name="'.strtolower($var_names[$i]).'">'));
                        $end_tag	= substr($this->files[$file_id], strpos(strtolower($this->files[$file_id]), '</if name="'.strtolower($var_names[$i]).'">'),strlen('</if name="'.strtolower($var_names[$i]).'">'));

                        $new_code = '';
                        if($if_code != ''){
                                global ${$var_names[$i]};
                                if(@${$var_names[$i]})
                                    $new_code = $if_code;

                                $this->files[$file_id] = str_replace($start_tag.$if_code.$end_tag, $new_code, $this->files[$file_id]);
                        }
                    }
                }

	/***************************************
	** Function for printing the resulting
	** file(s).
	***************************************/
		function print_file($file_id){
			if(is_long(strpos($file_id, ',')) == TRUE){
				$file_id = explode(',', $file_id);
				for(reset($file_id); $current = current($file_id); next($file_id)) echo $this->files[trim($current)];
			}else{
				echo $this->files[$file_id];
			}
		}

	/***************************************
	** Function for returning the resulting
	** file(s).
	***************************************/
		function return_file($file_id){
			$ret = '';
			if(is_long(strpos($file_id, ',')) == TRUE){
				$file_id = explode(',', $file_id);
				for(reset($file_id); $current = current($file_id); next($file_id)) $ret .= $this->files[trim($current)];
			}else{
				$ret .= $this->files[$file_id];
			}
			return $ret;
		}

	/***************************************
	** Parses and then immediately prints
	** the file. This function added by
	** Bruce Christensen.
	***************************************/
		function pprint($file_id, $replacements = ''){
			$this->register($file_id, $replacements);
			$this->parse($file_id);
			$this->print_file($file_id);
		}

	/***************************************
	** Parses and then immediately returns
	** the file's contents. Function added
	** by Bruce Christensen.
	***************************************/
		function pget($file_id, $replacements = ''){
			$this->register($file_id, $replacements);
			$this->parse($file_id);
			return $this->return_file($file_id);
		}

	/***************************************
	** Loads a file, parses it, and prints it.
	** This function added by Bruce Christensen.
	***************************************/
		function pprint_file($filename, $replacements = ''){
			for($file_id=1; isset($this->files[$file_id]); $file_id++);
			$this->load_file($file_id, $filename);
			$this->pprint($file_id, $replacements);
			unset($this->files[$file_id]);
		}

	/***************************************
	** Loads, parses and then immediately
	** returns the file's contents.
	** Function added by Bruce Christensen.
	***************************************/
		function pget_file($filename, $replacements = ''){
			for($file_id=1; isset($this->files[$file_id]); $file_id++);
			$this->load_file($file_id, $filename);
			return $this->pget($file_id, $replacements);
		}

	} // End of class
?>
