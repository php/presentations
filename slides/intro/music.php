<?php
$artist = isset($_POST['artist']) ? $_POST['artist'] : '';
$id = isset($_GET['id']) ? (int)$_GET['id'] : '';
$appid = 'Gux4Z8LIkY1IKfVXnRcMegs3IjNfmUhl'; // Get your own, please
$url = 'http://us.music.yahooapis.com';
$frm = "format=json";
?>
<html>
<form action="music.php" method="POST">
<input type="text" name="artist" value="<?php echo htmlspecialchars($artist)?>"/>
</form>
<?php
if($artist && !$id) {
  $q = "$url/artist/v1/list/search/artist/".rawurlencode($artist)."?appid=$appid&$frm";
  $j = json_decode(file_get_contents($q));
  echo "<table>\n";
  $arr = array();
  if($j->Artists->count == 1) $arr = array($j->Artists->Artist);
  else if($j->Artists->count>1) $arr = $j->Artists->Artist;
  else echo "Not Found";
  foreach($arr as $a) {
    echo <<<EOB
  <tr><th align="left"><a href="music.php?id={$a->id}">{$a->name}</a></th><td>{$a->website}</td>
      <td align="right">{$a->trackCount} tracks</td></tr>
EOB;
  }
  echo "</table>\n";
} else if($id) {
  $q = "$url/track/v1/list/artist/$id?appid=$appid&$frm";
  $j = json_decode(file_get_contents($q));
  echo "<table>\n";
  foreach($j->Tracks->Track as $t) {
    $s = $t->duration;
    $dur = sprintf("%d:%02d",(int)($s/60),$s%60);
    if(is_array($t->Category)) $cat = $t->Category[0]->name;
    else $cat = $t->Category->name;
    echo <<<EOB
  <tr><th><img src="{$t->Album->Release->Image[0]->url}"/></th>
      <th>{$t->title}</th><td>$dur</td><td>{$t->Album->Release->title}</td>
      <td>track #{$t->trackNumber}</td><td>$cat</td></tr>
EOB;
  }
  echo "</table>\n";
}
?>
</html>
