<form action="<? echo $PHP_SELF; ?>">
<input type="text" name="message">
<input type="submit">
</form>
<?
if (!empty($_GET['message']))
{
	$fp = fopen('./safer.txt', 'a');
	$msg = htmlentities($_GET['message']);
	fwrite($fp, "$msg<br>");
	fclose($fp);
}
readfile('./safer.txt');
?>
