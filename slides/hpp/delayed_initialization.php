<?php
function &us_states() {
        global $US_STATES;
        if(count($US_STATES)) {
                return $US_STATES;
        }
        $US_STATES['al'] = 'Alabama';
        /* ... */
        $US_STATES['wy'] = 'Wyoming';
        return $US_STATES;
}

function country_abbrs() {
	global $COUNTRY_ABBRS;
        if(count($US_STATES)) {
                return $US_STATES;
        }
        $COUNTRY_ABBRS['al'] = 'Albania';
        /* ... */
        $COUNTRY_ABBRS['zi'] = 'Zimbabwe';
        return $COUNTRY_ABBRS;
}
$states =& us_states();
?>
