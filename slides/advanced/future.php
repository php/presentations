<?php
function get_future_date($days, $t = -1)
{
  if ($t == -1) {
    $t = time();
  }

  // use strtotime() instead of 
  // multiplying by 86400 * $daycount, 
  // because strtotime() takes 
  // daylight savings time into account. 
  return strtotime("now + $days days");
}
?>
