<?php
include 'tplutil.inc';
include 'bugitemplate.class.php';
$tpl = new bugiTemplate('slides/pragmatic');
$tpl->tset_template(array('EXAMPLE' => 'bugi.tpl'));
$tpl->tassign_var(array(
  'TITLE' => 'My Title',
  'USER'  => get_user(),
));
foreach (get_users() as $user) {
  $tpl->tassign_blockvar(array('USER' => $user));
}
$tpl->tprint('EXAMPLE');
