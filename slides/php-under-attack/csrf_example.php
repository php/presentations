<?
$url = 'show.php/php-under-attack/6';
$tag = "<img src=\"$url?message=Hi\">";
echo htmlentities($tag);
echo $tag;
?>
