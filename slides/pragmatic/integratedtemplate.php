<?php
include 'tplutil.inc';
require_once 'HTML/IT.php';
$tpl = new IntegratedTemplate('slides/pragmatic');
$tpl->loadTemplateFile('integratedtemplate.tpl');
foreach (get_users() as $user) {
  $tpl->setCurrentBlock('option');
  $tpl->setVariable('USER', $user);
  $tpl->parseCurrentBlock();
}
$tpl->setVariable('TITLE', 'My Title');
$tpl->setVariable('USER', 'jimw');
$tpl->show();
