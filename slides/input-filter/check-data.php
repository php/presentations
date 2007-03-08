<?php
if (isset($_GET['data'])) {
	$o = 0;
	foreach( $flags as $flagName )
		if ( isset( $_GET[$flagName] ) )
			$o |= constant( $flagName );
	$data = filter_input( INPUT_GET, 'data', $filter, $o );
	var_dump( $data );
}
?>
