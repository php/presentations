<?php
error_reporting(E_ERROR);
require_once 'XML/Transformer.php';

function startTalk($attrs) {
	return "<presentation type='meeting_talk'>";
}

function endTalk($cdata) {
	return "$cdata</presentation>";
}

function startDate($attrs) {
	return "<year_month_day>";
}

function endDate($cdata) {
	return "$cdata</year_month_day>";
}

function startSpeaker($attrs) {
	return "<name role='speaker'>";
}

function endSpeaker($cdata) {
	return "$cdata</name>";
}

$options = array(
		'overloadedElements' => array(
			'talk' => array(
					'start' => 'startTalk',
					'end' => 'endTalk'
				),
			'date' => array(
					'start' => 'startDate',
					'end' => 'endDate'
				),
			'speaker' => array(
					'start' => 'startSpeaker',
					'end' => 'endSpeaker'
				)
		),
		'recursiveOperation' => false
	);

$xmlfile = 'data/sdphp_talks.xml';
$xmldoc = implode('',file($xmlfile));
$t = new XML_Transformer($options);
$newxml = $t->transform($xmldoc);
echo $newxml;
?>
