<?php
$filename = basename($_SERVER['REDIRECT_URL']);
if(preg_match('/^([^_]*?)_([^_]*?)_([^_]*?)\.(.*?)$/',$filename, $reg)) {
	$type = $reg[1];
	$text = $reg[2];
	$rgb = $reg[3];
	$ext = $reg[4];
}

if(strlen($rgb)==6) {
	$r = hexdec(substr($rgb,0,2));
	$g = hexdec(substr($rgb,2,2));
	$b = hexdec(substr($rgb,4,2));
} else $r = $g = $b = 0;

	switch(strtolower($ext)) {
		case 'jpg':
			Header("Content-Type: image/jpg");
			break;
		case 'png':
		case 'gif': /* We don't do gif - send a png instead */
			Header("Content-Type: image/png");
			break;
		default:
			break;
	}

	switch($type) {
		case 'solid':
			$im = imagecreatetruecolor(80,80);
			$bg = imagecolorallocate($im, $r, $g, $b);
			imagefilledrectangle($im,0,0,80,80,$bg);
			break;
		case 'button':
			$si = 32; $font = "php";
			$im = imagecreatefrompng('blank_wood.png');
			$tsize = imagettfbbox($si,0,$font,$text);
			$dx = abs($tsize[2]-$tsize[0]);
			$dy = abs($tsize[5]-$tsize[3]);
			$x = ( imagesx($im) - $dx ) / 2;
			$y = ( imagesy($im) - $dy ) / 2 + $dy;
			$white = ImageColorAllocate($im,255,255,255);
			$black = ImageColorAllocate($im,$r,$g, $b);
			ImageTTFText($im, $si, 0, $x, $y, $white, $font, $text);
			ImageTTFText($im, $si, 0, $x+2, $y, $white, $font, $text);
			ImageTTFText($im, $si, 0, $x, $y+2, $white, $font, $text);
			ImageTTFText($im, $si, 0, $x+2, $y+2, $white, $font, $text);
			ImageTTFText($im, $si, 0, $x+1, $y+1, $black, $font, $text);
		break;
	}
	Header("HTTP/1.1 200 OK");
	$dest_file = dirname($_SERVER['SCRIPT_FILENAME']).'/'.$filename;
	switch(strtolower($ext)) {
		case 'png':
		case 'gif':
			@ImagePNG($im,$dest_file);
			ImagePNG($im);
			break;
		case 'jpg':
			@ImageJPEG($im,$dest_file);
			ImageJPEG($im);
			break;
	}
?> 
