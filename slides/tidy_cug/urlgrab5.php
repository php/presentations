<?php
	function dump_nodes(tidy_node $node, &$urls = NULL) {

		$urls = (is_array($urls)) ? $urls : array();
	
		if(isset($node->id)) {
			if($node->id == TIDY_TAG_A) {
				$urls[] = $node->attribute['href'];
	    		}
		}
		    
		if($node->hasChildren()) {

			foreach($node->child as $c) {

				dump_nodes($c, $urls);
		
			}

		}
	
		return $urls;
    	}

	$a = tidy_parse_file($_SERVER['argv'][1]);
    $a->cleanRepair();
    print_r(dump_nodes($a->html()));
?>
