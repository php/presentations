<?php
error_reporting(E_ERROR);
require_once 'Tree/Tree.php';
$xmlfile = 'presentations/slides/sdphp/data/sdphp_talk.xml';

$tree = Tree::SetupMemory('XML', $xmlfile);
$tree->setup();
$id = $tree->getIdByPath('/talk/title');
$e = $tree->getElement($id);
echo "<i>{$e['name']}</i> ==> {$e['cdata']}<br>\n";
$id = $tree->getIdByPath('/talk/speaker');
$e = $tree->getElement($id);
echo "<i>{$e['name']}</i> ==> {$e['cdata']}<br>\n";
?>
