<?php
function expand_macros($text, &$macroset) {
    if ($text) {
        $text = preg_replace(array_keys($macroset), 
					array_values($macroset), 
					$text);
    }
    return $text;
}
?>
