<?php
include 'tplutil.inc';
include 'phemplate.class.php';

$tpl = new phemplate('slides/pragmatic/');
$tpl->set_var('TITLE', 'My Title');
$tpl->set_var('USER', get_user());
$tpl->set_loop('OPTIONS', get_users(true));
$tpl->set_file('main', 'phemplate.tpl');
echo $tpl->process('out', 'main', 1);
