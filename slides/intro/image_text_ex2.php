<?
$im  = ImageCreate(600,7150);
$white = ImageColorAllocate($im,255,255,255);
$black = ImageColorAllocate($im,0,0,0);
$dir = opendir('/usr/share/fonts/truetype');
$y=30;
while($file = readdir($dir)) {
	if(substr($file,strrpos($file,'.'))=='.ttf') {
		ImageString($im,5,5,$y-20,substr($file,0,-4),$black);
		ImageTTFText($im,30,0,100,$y,$black, substr($file,0,-4),"ABCdéf123");
		$y+=40;
	}
}
Header('Content-Type: image/png');
ImagePNG($im);
?>
