<?php
/* tell tidy to automatically clean & repair output */
ini_set("tidy.clean_output", TRUE);

/* set tidy output buffer, which will by default 
 * automatically correct HTML output */
ob_start("ob_tidyhandler");
?>
<B>testing</I>