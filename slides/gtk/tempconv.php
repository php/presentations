<?php

dl('php_gtk.so');

/* set up main window */
$window =& new GtkWindow();
$window->set_title('Temperature Conversion');
$window->set_policy(false, true, false);
$window->set_border_width(5);
$window->set_position(GTK_WIN_POS_CENTER);

/* create main vertical box */
$vbox =& new GtkVBox(false, 5);

/* create first row box */
$hbox =& new GtkHBox(false, 5);
/* add label */
$hbox->pack_start(new GtkLabel('Enter temperature:'), false);

/* add an entry field */
$t_entry =& new GtkEntry();
$hbox->pack_start($t_entry, true, true);

/* put first row box into vertical one */
$vbox->pack_start($hbox, false);

/* create an empty label and add to vertical box */
$res_label =& new GtkLabel();
$vbox->pack_start($res_label);

/* create third row box */
$hbox =& new GtkHBox(true, 5);

/* create buttons and connect signals */
$celsius_b =& new GtkButton('To Celcius');
$celsius_b->connect('clicked', 'on_celsius_clicked', $t_entry, $res_label);
$fahr_b =& new GtkButton('To Fahrenheit');
$fahr_b->connect('clicked', 'on_fahr_clicked', $t_entry, $res_label);
$exit_b =& new GtkButton('Exit');
$exit_b->connect('clicked', 'on_exit_clicked');

/* add buttons to third row box */
$hbox->pack_start($celsius_b);
$hbox->pack_start($fahr_b);
$hbox->pack_start($exit_b);

/* add third row box to vertical one */
$vbox->pack_start($hbox, false);

/* add vertical box to main window */
$window->add($vbox);

/* show window and all contained widgets */
$window->show_all();

/* have entry field grab keyboard focus */
$t_entry->grab_focus();

/* start the main loop */
gtk::main();

function on_celsius_clicked($button, $t_entry, $res_label)
{
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

function on_fahr_clicked($button, $t_entry, $res_label)
{
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
