<?php
class cia {
	private $agents = array();

	function remove_secret_ops($agent) {
		return $agent != 'Sterling';
	}

	function get_agents() {
		return array_filter($this->agents, 
			array($this, 
				  'remove_secret_ops')
		);
	}

	function add_agent($name) {
		array_push($this->agents, $name);
	}
}

class cia_administration extends cia {
	function __construct() {
		$this->add_agent('Sterling');
		$this->add_agent('Zeev');
		$this->add_agent('Andi');
		$this->add_agent('Rasmus');
		$this->add_agent('Thies');
	}
}

$cia = new cia_administration;
$pubagents = $cia->get_agents();
$allagents = $cia->agents;

$secretops = array_diff($allagents, 
						$pubagents);
foreach ($secretops as $sop) {
	echo "$sop is a undercover spy, ";
	echo "let's assasinate him! ";
	echo "Viva la Perl!\n<br />\n";
}

$cia->add_agent('Larry Wall');

$newagents = $cia->get_agents();
foreach ($newagents as $agent) {
	echo "$agent is ok, he can go ";
	echo "through security.\n<br />\n";
}
?>
