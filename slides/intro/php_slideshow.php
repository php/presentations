<script type="text/javascript" src="/jquery.min.js"></script>
<script type="text/javascript" src="/fadeslideshow.js">

/***********************************************
* Ultimate Fade In Slideshow v2.0- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
***********************************************/

</script>
<script type="text/javascript">
var mygallery=new fadeSlideShow({
	wrapperid: "fadeshow", //ID of blank DIV on page to house Slideshow
	dimensions: [1000, 720], //width/height of gallery in pixels. Should reflect dimensions of largest image
	imagearray: [

<?php 
$slides = file(__DIR__.'/slideshow_images/order.txt');
$cnt = count($slides);
foreach($slides as $line) {
    $cnt--;
    list($img,$url,$type,$desc) = str_getcsv($line);
    echo "[\"/presentations/slides/intro/slideshow_images/$img\", \"$url\", \"$type\", \"$desc\"]";
    if($cnt) echo ",\n";
    else echo "\n"; // No comma on last element
}
?>

	],
	displaymode: {type:'auto', pause:1500, cycles:1, wraparound:false},
	persist: false, //remember last viewed slide and recall within same session?
	fadeduration: 300, //transition duration (milliseconds)
	descreveal: "ondemand",
	togglerid: "fadeshowtoggler"
})

</script>

<div id="fadeshow"></div>

<div id="fadeshowtoggler" style="width:270px; text-align:center; margin-top:10px">
<a href="#" class="prev"><img src="/images/left.png" style="border-width:0" /></a>  <span class="status" style="margin:0 50px; font-weight:bold"></span> <a href="#" class="next"><img src="/images/right.png" style="border-width:0" /></a>
</div>

