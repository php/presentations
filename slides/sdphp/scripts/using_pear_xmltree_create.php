<?php
require_once 'XML/Tree.php';

$tree = new XML_Tree();
$root =& $tree->addRoot('slide','', array('title'=>'A simple slide'));
$root->addChild('blurb','A blurb element', array('align'=>'center'));
$root->addChild('example','',array('type'=>'xml',
				'filename'=>'data/sdphp_talks.xml'));
$list =& $root->addChild('list','',array('type'=>'arrow'));
$list->addChild('bullet','first bullet');
$list->addChild('bullet','second bullet');
$out = $tree->get();

echo nl2br(htmlspecialchars($out));
?>
