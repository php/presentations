<?php

  dl('php_gtk.so');
  
  $window =& new GtkWindow(GTK_WINDOW_DIALOG);
  $window->set_title('Clock');
  $window->set_border_width(10);
  $window->connect('destroy', 'destroy');
  
  $label =& new GtkLabel();
  $window->add($label);
  
  gtk::timeout_add(1000, 'update', $label);
  
  update($label);
  $window->show_all();
  
  gtk::main();
  
  function update($label)
  {
  	$time = strftime('%H:%M:%S %p');
  	$label->set_text($time);
  	return true;
  }
  
  function destroy($window)
  {
  	gtk::main_quit();
  }

?>
