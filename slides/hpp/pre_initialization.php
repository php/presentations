<?php
/* Geographic Constants */
$US_STATES['al'] = 'Alabama';
/* ... */
$US_STATES['wy'] = 'Wyoming';

$COUNTRY_ABBRS['al'] = 'Albania';
/* ... */
$COUNTRY_ABBRS['zi'] = 'Zimbabwe';

/* Geographic Functions */

function is_valid_zip($zipcode) {
	return preg_match("/\d{5}/", $zipcode);
}
?>
