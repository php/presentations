<?php
include 'tplutil.inc';
include 'class.FastTemplate.php3';

$tpl = new FastTemplate("slides/pragmatic");
$tpl->define(array(
  'main'   => 'fasttemplate.tpl',
  'option' => 'fasttemplate-option.tpl',
));
foreach (get_users() as $user) {
  $tpl->assign(array('USER' => $user));
  $tpl->parse('OPTIONS', '.option');
}
$tpl->assign(array(
  'USER' => get_user(),
  'TITLE' => 'My Title',
));
$tpl->parse('MAIN', 'main');
$tpl->FastPrint();
