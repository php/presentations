<?php
function expand_macros_helper($sub)
{
    $macros = $GLOBALS['macroset'];
    $sub = $sub[1];
    return array_key_exists($sub, $macros) ? 
		$macros[$sub] : "{$sub}";
}

function expand_macros5($text, &$macroset)
{
    $GLOBALS['macroset'] = $macroset;
    if ($text) {
        $text = preg_replace_callback("/{([^}]*)}/",
            'expand_macros_helper', $text);
    }
    return $text;
}
?>
