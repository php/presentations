<?
$im  = ImageCreate(175,125);
$white = ImageColorAllocate($im,255,255,255);
$black = ImageColorAllocate($im,0,0,0);
ImageString($im,1,10,20,"Font 1: ABCdef",$black);
ImageString($im,2,10,35,"Font 2: ABCdef",$black);
ImageString($im,3,10,53,"Font 3: ABCdef",$black);
ImageString($im,4,10,70,"Font 4: ABCdef",$black);
ImageString($im,5,10,90,"Font 5: ABCdef",$black);
ImageStringUp($im,5,150,118,"Vertical Text",$black);
Header('Content-Type: image/png');
ImagePNG($im);
?>
