<?php

dl('php_gtk.so');

$interface =& new GladeXML(dirname(__FILE__).'/tempconv.glade');
$interface->signal_autoconnect();

/* start the main loop */
gtk::main();

function on_celsius_clicked($button)
{
	global $interface;

	$t_entry = $interface->get_widget('input_temp');
	$res_label = $interface->get_widget('result');

	/* get contents of the entry field */
	$chars = $t_entry->get_chars(0, -1);
	if (empty($chars) || !is_numeric($chars)) {
		/* if invalid contents, indicate so, reselect entry field and focus on it */
		$res_label->set_text('Invalid input');
	} else {
		/* if valid contents, perform conversion and output result */
		$temp = (((int)$chars)-32)/1.8;
		$res_label->set_text(sprintf("$chars Fahrenheit is %.1f Celsius", $temp));
	}

	$t_entry->select_region(0, -1);
	$t_entry->grab_focus();
}

function on_fahr_clicked($button)
{
	global $interface;

	$t_entry = $interface->get_widget('input_temp');
	$res_label = $interface->get_widget('result');

	$chars = $t_entry->get_chars(0, -1);
	if (empty($chars) || !is_numeric($chars)) {
		/* if invalid contents, indicate so, reselect entry field and focus on it */
		$res_label->set_text('Invalid input');
	} else {
		/* if valid contents, perform conversion and output result */
		$temp = ((int)$chars)*1.8+32;
		$res_label->set_text(sprintf("$chars Celsius is %.1f Fahrenheit", $temp));
	}

	$t_entry->select_region(0, -1);
	$t_entry->grab_focus();
}

function on_exit_clicked($button)
{
	/* exit the main loop */
	gtk::main_quit();
}

?>
