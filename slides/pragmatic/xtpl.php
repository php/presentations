<?php
include 'tplutil.inc';
include 'xtpl.p';

$tpl = new XTemplate('slides/pragmatic/xtpl.tpl');

foreach (get_users(true) as $user) {
  $tpl->assign('USERS', $user);
  $tpl->parse('main.USERS');
}

$tpl->assign('TITLE', 'My Title');
$tpl->assign('USER', get_user());

$tpl->parse('main');
$tpl->out('main');
