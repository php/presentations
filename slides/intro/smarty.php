<?php
include 'tplutil.inc';
require 'Smarty.class.php';

$tpl = new Smarty();
$tpl->assign('TITLE', 'my title');
$tpl->assign('USER', get_user());
$tpl->assign('USERS', get_users());

$tpl->display('smarty.tpl');
