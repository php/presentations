<?php
function get_user() {
  return 'jimw';
}

function get_users($assoc = 0) {
 $users = array('andi', 'andrei', 'jimw', 'rasmus', 'sam', 'sascha', 'shane', 'stig', 'thies', 'zeev');
 if ($assoc) {
   $out = array();
   foreach ($users as $user) {
     $out[] = array('USER' => $user);
   }
   return $out;
 }
 else {
   return $users;
 }
}
