<?php
if (!extension_loaded('gtk')) {
	dl( 'php_gtk.' . PHP_SHLIB_SUFFIX);
}

/* Called when the window is being destroyed. Simply quit the main loop. */
function destroy()
{
	Gtk::main_quit();
}

/* Called when button is clicked. Print the message and destroy the window. */
function hello()
{
	global	$window;
	print "Hello World!\n";
	$window->destroy();
}

$window = &new GtkWindow();
$window->connect('destroy', 'destroy');

/* Create a button, connect its clicked signal to hello() function and add
 * the button to the window.  */
$button = &new GtkButton('Hello World!');
$button->connect('clicked', 'hello');
$window->add($button);

$window->show_all();
Gtk::main();
?>
