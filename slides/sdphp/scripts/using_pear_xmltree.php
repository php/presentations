<?php
require_once 'XML/Tree.php';

$xmlfile = 'presentations/slides/sdphp/data/sdphp_talk2.xml';

$tree = new XML_Tree($xmlfile);
$root = $tree->getTreeFromFile();
echo "<pre>\n";
print_r($root);
echo "</pre>\n";
?>
