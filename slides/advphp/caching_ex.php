<?php

print get_php_net();

define ('CACHEFILE', '/tmp/' . md5('php.net') . '_sh');
define ('CACHETIME', 180); // time to expiry, in secs

function 
get_php_net ()
{
    $st = @stat (CACHEFILE);
    if ($st === false) { // fallthrough and download it
	return download_url ();
    }

    if (CACHETIME < (time() - $st['mtime'])) {
	return get_cached_data ();
    }


    return download_url ();
}
	

function 
download_url () 
{
    $data = implode ('', file ('http://www.php.net/'));

    // write the new url
    $fp = fopen (CACHEFILE, 'w');
    if (!$fp) {
	die ('Cannot open cache file for write access');
    }
    flock ($fp, LOCK_EX);
    fwrite ($fp, $data);
    flock ($fp, LOCK_UN);
    fclose ($fp);

    // return the website
    return $data;
}

function
get_cached_data ()
{
    return implode ('', file (CACHEFILE));
}
?>
