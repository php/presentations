<?php
require 'XML/RSS.php';

$r =& new XML_RSS('barrapunto.rss');
$r->parse();

$allItems = $r->getItems();
$itemCount = count($allItems);
$width = 1000;
$m = new SWFMovie();
$m->setDimension($width, 70);
$m->setBackground(0xcf, 0xcf, 0xcf);

$f = new SWFFont("../../../../pres2/fonts/Techno.fdb");

$hit = new SWFShape();
$hit->setRightFill($hit->addFill(0,0,0));
$hit->movePenTo(-($width/2), -30);
$hit->drawLine($width, 0);
$hit->drawLine(0, 60);
$hit->drawLine(-$width, 0);
$hit->drawLine(0, -60);
$x = 0;

// build the buttons
foreach($allItems as $Item) {

	$title = $Item['title'];
	$link = $Item['link'];

	// get the text
	$t = new SWFText();
	$t->setFont($f);
	$t->setHeight(50);
	$t->setColor(0,0,0);
	$t->moveTo(-$f->getWidth($title)/2, 25);
	$t->addString($title);
	
	// make a button
	$b[$x] = new SWFButton();
	$b[$x]->addShape($hit, SWFBUTTON_HIT);
	$b[$x]->addShape($t, SWFBUTTON_OVER | SWFBUTTON_UP | SWFBUTTON_DOWN);
	$b[$x++]->addAction(new SWFAction("getURL('$link','_new');"), SWFBUTTON_MOUSEUP);
}


// display them
for($x=0; $x<$itemCount; $x++) {

	$i = $m->add($b[$x]);
	$i->moveTo($width/2,30);

	for($j=0; $j<=30; ++$j) {
		$i->scaleTo(sqrt(sqrt($j/30)));
		$i->multColor(1.0, 1.0, 1.0, $j/30);
		$m->nextFrame();
	}
	
	for($j=0; $j<=30; ++$j) {
		$i->scaleTo(sqrt(sqrt(1+($j/30))));
		$i->multColor(1.0, 1.0, 1.0, (30-$j)/30);
		$m->nextFrame();
	}

	$m->remove($i);

}

header('Content-type: application/x-shockwave-flash');
$m->output();
?>
