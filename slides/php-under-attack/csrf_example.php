<?
$url = 'show/php-under-attack/8';
$tag = "<img src=\"$url?message=CSRF\">";
echo htmlentities($tag);
echo $tag;
?>
