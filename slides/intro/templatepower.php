<?php
include 'tplutil.inc';
include 'class.TemplatePower.inc.php';

$tpl = new TemplatePower('presentations/slides/intro/templatepower.tpl');
$tpl->prepare();

$tpl->assign("TITLE", 'My Title');
$tpl->assign("USER", get_user());

foreach (get_users() as $user) {
  $tpl->newBlock('USERS');
  $tpl->assign('USER', $user);
}

$tpl->printToScreen();
