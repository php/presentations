<?  header('Content-type: application/x-shockwave-flash');
	swf_openfile('php://stdout',400, 300, 30, 1, 1, 1);
	swf_ortho2(-100, 100, -100, 100); 
	swf_definefont(10, "Mod");
	swf_fontsize(60);
	swf_definetext(5, "$str", 1);
	for ($i = -100; $i < 100; $i++) {
		swf_pushmatrix ();
		swf_addcolor(.1,abs($i/100),.5+abs($i/100),1);
		swf_translate ($i,$i, $i);
		swf_rotate(2*$i,'z'); swf_rotate(2*$i,'y');
		swf_scale(1-abs($i/100),1-abs($i/100),0);
		swf_removeobject(1); 
		swf_placeobject(5, 1);
		swf_popmatrix (); swf_showframe ();
	}
	swf_closefile();
?>
