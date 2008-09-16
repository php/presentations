<?php
$q = isset($_POST['q']) ? $_POST['q'] : '';
$type = isset($_POST['type']) ? $_POST['type'] : 'web';

$appid = 'Gux4Z8LIkY1IKfVXnRcMegs3IjNfmUhl';  // Get your own, please
$url = 'http://boss.yahooapis.com/ysearch';
$frm = "format=xml";
?>
<html>
<form action="boss.php" method="POST">
<input type="text" name="q" value="<?php echo htmlspecialchars($q)?>"/>
<select name="type">
<option>web</option><option>images</option>
<option>news</option><option>spelling</option>
</select>
</form>
<?php
if($q) {
  $q = "$url/$type/v1/".rawurlencode($q)."?appid=$appid&$frm";
  $result = file_get_contents($q);
  echo '<pre>'.htmlspecialchars($result).'</pre>';
}
?>
</html>
