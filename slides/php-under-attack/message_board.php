<form action="<? echo $PHP_SELF; ?>">
<input type="text" name="message">
<input type="submit">
</form>
<?
if (!empty($_GET['message']))
{
	$fp = fopen('./messages.txt', 'a');
	fwrite($fp, "{$_GET['message']}<br>");
	fclose($fp);
}
readfile('./messages.txt');
?>
