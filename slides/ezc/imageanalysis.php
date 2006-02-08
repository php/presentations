<?php
require 'ezc-setup.php';

$image = new ezcImageAnalyzer( dirname( __FILE__ ) . '/moon.jpg' );

if ( in_array( $image->mime, array( 'image/tiff', 'image/jpeg' ) ) )
{
    $date = date( DATE_RFC822, $image->data->date );
    $exif = $image->data->exif['EXIF'];

    $shutterSpeedArray = split( '/', $exif['ExposureTime'] );
    $shutterSpeed = "1/" . $shutterSpeedArray[1] / $shutterSpeedArray[0]  . " sec";

    $apertureArray = split( '/', $exif['FNumber'] );
    $aperture = "F" . round( $apertureArray[0] / $apertureArray[1], 1 );

    $focalLengthArray = split( "/", $exif['FocalLength'] );
    $focalLength = round( $focalLengthArray[0] / $focalLengthArray[1], 2 ) . " mm";

    print <<<OUTPUTEND
<dl>
    <di>Photo taken on:</di><dd>$date</dd>
    <di>Shutter speed:</di><dd>$shutterSpeed</dd>
    <di>Aperture:</di><dd>$aperture</dd>
    <di>Focal length:</di><dd>$focalLength</dd>
</dl>
OUTPUTEND;
}
?>
