<?php

	define('DPI', 75);
	define('OBS_DIST', DPI*12);
	define('EYE_SEP', (int)DPI*2.5);
	define('SEP_FACTOR', 0.55);
	define('MAX_SCENE_HEIGHT', 255);
	define('MIN_SCENE_HEIGHT', 0);
	define('MAX_DEPTH', OBS_DIST);
	define('MIN_DEPTH', (int)((SEP_FACTOR*MAX_DEPTH*OBS_DIST)/((1-SEP_FACTOR)*MAX_DEPTH+OBS_DIST)));
	define('HEIGHT_SCALE', 2);

	/* Init Random Number Generator */
	srand(time());
		
	$filename = "depthmap.png";
		
	$depth_img = imagecreatefrompng($filename);
	
	if(!$depth_img) die ("Error -- could not load depth image ($filename)!");
	
	$img_width = imagesx($depth_img);
	$img_height = imagesy($depth_img);
	
	/* Create the image used in the stereogram */
	$stereo_img = imagecreate($img_width, $img_height);
	
	if(!$stereo_img) die("Error -- could not allocate stereo image!");
	
	/* Initialize the colors that will be used in the image */
	for($i = 0; $i < 256; $i++) {
				
		if(isset($_POST['bw'])) {
			
			$rnd_color = rand(0,255);
			$colors[] = imagecolorallocate($stereo_img, 
										   $rnd_color,
										   $rnd_color,
										   $rnd_color);
		} else {
			$colors[] = imagecolorallocate($stereo_img, 
										   rand(0,255),
										   rand(0,255),
										   rand(0,255));
		}
		
	}	
	
	/* Load the img array with the random graphics data */
	for($y = 0; $y < $img_height; $y++) {
		for($x = 0; $x < $img_width; $x++) {

			//$buffer[$x][$y] = $colors[rand(0,255)];
			$temp = imagecolorsforindex($depth_img,imagecolorat($depth_img, $x, $y));
			
			/* Get the current blue element */
			$depth_color = $temp['blue'];
			$height = $depth_color/HEIGHT_SCALE;
			$height = ($height > MAX_SCENE_HEIGHT) ? MAX_SCENE_HEIGHT : $height;
			$height = ($height < MIN_SCENE_HEIGHT) ? MIN_SCENE_HEIGHT : $height;
			$feature_z = MAX_DEPTH-$height*(MAX_DEPTH-MIN_DEPTH)/256;
			$sep = (int)((float)(EYE_SEP*$feature_z)/($feature_z+OBS_DIST));
		
			$left_px = (int)$x-($sep/2);
			$right_px = (int)$x+($sep/2);
		
			if(($left_px >= 0) && ($right_px < $img_width)) {
				
				if(!isset($buffer[$left_px][$y]))
					$buffer[$left_px][$y] = $colors[rand(1,255)];
				
				$buffer[$right_px][$y] = $buffer[$left_px][$y];	
			}
			
		}
		
		for($x = 0; $x < $img_width;$x++)
			if(!isset($buffer[$x][$y])) 
				$buffer[$x][$y] = $colors[rand(1,255)];
	}
	
	
	
	/* Output PNG File */
	
	for($y = 0; $y < $img_height; $y++) {
		for($x = 0; $x < $img_width; $x++) {
			imagesetpixel($stereo_img,$x, $y, $buffer[$x][$y]);
		}
	}
	
	header("Content-type:  image/png");
	$black = imagecolorclosest($stereo_img, 0,0,0);
	$white = imagecolorclosest($stereo_img, 0xff, 0xff, 0xff);
	imagefilledrectangle($stereo_img, 0, $img_height-20, $img_width, $img_height, $black);
	imagestring($stereo_img, 1, 5, $img_height-10, "Made at http://www.coggeshall.org/stereogram.php", $white);
	
	imagepng($stereo_img);
						
?>