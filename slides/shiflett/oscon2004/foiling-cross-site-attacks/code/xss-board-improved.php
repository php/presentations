<form
action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="text" name="message"><br />
<input type="submit">
</form>

<?php

$clean = array();

if (isset($_GET['message']))
{
	$clean['message'] =
	htmlentities($_GET['message']);

	$fp = fopen('./safer.txt', 'a');
	fwrite($fp, "{$clean['message']}<br />");
	fclose($fp);
}

readfile('./safer.txt');

?>
