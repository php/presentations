<?php
    class node {
        var $key; var $value; var $left; var $right;
    }

    class binsearch {
        var $root = NULL;

        function binsearch($elements) {
            foreach ($elements as $key => $value) {
                $this->add_value($key, $value);
            }
			echo "<pre>", substr(var_export($this->root, true), 0, 190), "\n...",
				 substr(var_export($this->root, true), -40), "</pre>";
        }   

        function add_value($key, $value) {
            $ptr = &$this->root;

            while ($ptr != NULL) {
                if ($key < $ptr->key) {
                    $ptr = &$ptr->left;
                } else {
                    $ptr = &$ptr->right;
                }   
            }   
            $ptr = new node;
            $ptr->key = $key;
            $ptr->value = $value;
            $ptr->left = NULL;
            $ptr->right = NULL;
        }   

        function get_value($key) {
            $ptr = &$this->root;
            
            while ($key != $ptr->key && $ptr != NULL) {
                if ($key < $ptr->key) {
                    $ptr = &$ptr->left;
                } else {
                    $ptr = &$ptr->right;
                }   
            }   
            return $ptr ? $ptr->value : FALSE;
        }
    }
?>
