<?php
include 'tplutil.inc';
include 'class.template.inc';

$GLOBALS['TITLE'] = 'My Title';
$GLOBALS['USER'] = get_user();
$GLOBALS['users'] = get_users(true);

$tpl = new template;
$tpl->load_file('main', 'slides/pragmatic/templateclass.tpl');
$tpl->parse_loop('main', 'users');
$tpl->pprint('main', array('USER', 'TITLE'));
