<?php
function subfunc($sub, &$macros)
{
    return array_key_exists($sub, $macros) ?
		   $macros[$sub]: "{$sub}";
}


function expand_macros3($text, &$macroset)
{
    if ($text) {
        $text = preg_replace("/{([^}]*)}/e",
            "subfunc('\\1', \$macroset)", $text);
    }
    return $text;
}
?>
