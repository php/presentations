<?php
class EmailAddress {
	public $user;
	public $host;

	function __construct($mail) {
		list($this->user, $this->host) = explode('@', $mail, 2);
	}
}
?>
