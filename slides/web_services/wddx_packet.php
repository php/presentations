<?php
class foo {
	var $bar;

	function foo()
	{
		$this->bar = 1;
	}
}

	$a = 1; $b = array(1,2,3); $c = new foo();

	// create a new wddx packet, with description
	$p_id = wddx_packet_start("My PHP Packet");
	
	// append variables to wddx packet
	wddx_add_vars($p_id, 'a', 'b', 'c');

	// finalize & serialize the packet
	$wddx_packet = wddx_packet_end($p_id);

	echo $wddx_packet;
?>