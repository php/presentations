<?
	$s = new SWFShape();
	$fp = fopen('php-big.jpg','r');
	$jpg = new SWFBitmap($fp);
	$w = $jpg->getWidth(); $h = $jpg->getHeight();

	$f = $s->addFill($jpg);
	$f->moveTo(-$w/2, -$h/2);
	$s->setRightFill($f);

	$s->movePenTo(-$w/2, -$h/2);
	$s->drawLine($w, 0);
	$s->drawLine(0, $h);
	$s->drawLine(-$w, 0);
	$s->drawLine(0, -$h);

	$p = new SWFSprite();
	$i = $p->add($s);

	for($step=0; $step<360; $step+=2) {
		$p->nextFrame();
		$i->rotate(-2);
	}

	$m = new SWFMovie();
	$i = $m->add($p);
	$i->moveTo(230,120);
	$m->setRate(100);
	$m->setDimension($w*1.8, $h*1.8);
		
	header('Content-type: application/x-shockwave-flash');
	$m->output();
?>
