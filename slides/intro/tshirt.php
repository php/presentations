<?
Header("Content-type: image/png");
if(!$si) $si = 30; if(!$text) $text = 'php';
$font = '../../fonts/phpi.ttf';
$im = imlib_load_image('tshirt.png');
$w = imlib_image_get_width($im);
$h = imlib_image_get_height($im);
$im2 = imlib_load_image('blank.png');
$w2 = imlib_image_get_width($im2);
$h2 = imlib_image_get_height($im2);
$r = 110/$w2; $sh = $r*$h2;
imlib_image_modify_alpha($im,255);
imlib_image_modify_alpha($im2,150);
imlib_blend_image_onto_image($im,$im2,1,0,0,$w2,$h2,
                                 70,70,110,$sh,0,1,1);
$fnt = imlib_load_font($font."/$si");
imlib_get_text_size($fnt,$text,$dx,$dy,0);
$x = 5+$w/2-$dx/2;
$y = 70+$sh/2-$dy/2;
// Fuzz-factor for all lowercase
if(strtolower($text) == $text) $y-=6;
imlib_text_draw($im, $fnt, $x+2, $y+2, $text, 0, 255,255,255, 220);
imlib_text_draw($im, $fnt, $x, $y+2, $text, 0, 255,255,255, 220);
imlib_text_draw($im, $fnt, $x+2, $y, $text, 0, 255,255,255, 220);
imlib_text_draw($im, $fnt, $x, $y, $text, 0, 255,255,255, 220);
imlib_text_draw($im, $fnt, $x+1, $y+1, $text, 0, 0,0,0, 220);
imlib_free_font($fnt);
$fnt2 = imlib_load_font($font."/25");
imlib_text_draw($im, $fnt2, 10, $h-40, "www.php.net", 0, 0,0,0, 65);
imlib_dump_image($im,$err,90);  
?>
