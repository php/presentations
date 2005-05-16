<?php        
/* create tidy resource based on HTML string */
$a = tidy_parse_string("<HTML></HTML>");
tidy_clean_repair($a); // repair the given HTML
$out = tidy_get_output($a); // get output

echo nl2br(htmlspecialchars($out));
?>