<?php
class board_game {
	function move_next() {
		echo "next\n";
	}

	function move_prev() {
		echo "prev\n";
	}
}

interface price {
	function get_price();
}

class monopoly 
	extends board_game 
	implements price 
{
	function get_price() {
		return 22.95;
	}
}

$g = new monopoly;
if ($g instanceof price) {
	var_dump($g->get_price());
}

?>
