<?php

class Wiki
{
    function matchWord($word)
    {
        return preg_match('^[A-Z]+[a-z]+[A-Za-z0-9]*$', $word);
    }

    function formatWord($word)
    {
        $word = preg_replace('/([a-z])([A-Z])/', '\1 \2', $word);
        $word = preg_replace('/([a-zA-Z])(\d)/', '\1 \2', $word);
        return $word;
    }

    function process($contents)
    {
        // First, substitute macros
        if (preg_match_all('/{([a-z-]+)\s*([^}]*?)}/s', $contents, $matches)) {
            list($strings, $funcs, $args) = $matches;
            for ($i = 0; $i < sizeof($strings); $i++) {
                $replace = Wiki::runMacro($funcs[$i], $args[$i]);
                $contents = str_replace($strings[$i], $replace, $contents);
            }
        }
        // Finally, add Wiki-links
        if (preg_match_all('#(.*?)\b([A-Z]+[a-z]+[A-Z\d][A-Za-z\d]*)\b(.*?)#s', $contents, $matches)) {
            list(, $pre_text, $nodes, $post_text) = $matches;
            $self = $_SERVER['SCRIPT_NAME'];
            $tmp = '';
            for ($i = 0; $i < sizeof($nodes); $i++) {
                $spaced = Wiki::formatWord($nodes[$i]);
                $replace = "<a href=\"{$self}/{$nodes[$i]}\">$spaced</a>";
                $tmp .= $pre_text[$i] . $replace . $post_text[$i];
            }
            $contents = $tmp;
        }
        return nl2br($contents);
    }

    function nodeExists($node)
    {
        static $cache = array();
        if (isset($cache[$node])) {
            return $cache[$node];
        }
        global $dbh;
        $id = $dbh->getOne('SELECT id FROM nodes WHERE name = ?', $node);
        if ($id !== null) {
            $cache[$node] = $id;
        }
        return (bool)$id;
    }


    function runMacro($func, $arg)
    {
        global $dbh;
        $ret = '';
        switch ($func) {
            case 'list':
                $arg = str_replace('?', '_', $arg);
                $arg = str_replace('*', '%', $arg);
                $sql = "SELECT name FROM nodes WHERE name LIKE '$arg'";
                // catch errors
                $dbh->pushErrorHandling(PEAR_ERROR_RETURN);
                $nodes = $dbh->getCol($sql, 0);
                $dbh->popErrorHandling();
                if (is_array($nodes)) {
                    $ret = implode("\n", $nodes);
                }
                break;
            case 'phpdoc':
                $url = "http://php.net/$arg";
                $ret = "<a href=\"$url\">$arg (php.net)</a>";
                break;
            case 'pear-listall':
                include_once "PEAR/Config.php";
                include_once "PEAR/Remote.php";
                $config = &PEAR_Config::singleton();
                @$remote =& new PEAR_Remote($config);
                @$packages = $remote->call('package.listAll');
                $ret = implode("\n", array_keys($packages));
                break;
            case 'recent':
                include_once "Date.php";
                $arg = (int)$arg;
                $res = $dbh->limitQuery("SELECT name, mtime FROM nodes ORDER BY mtime DESC", 0, $arg);
                $ret = '';
                while ($res->fetchInto($tmp)) {
                    $date = new Date($tmp['mtime']);
                    $ret .= "$tmp[name] " . $date->getDate() . "\n";
                }
                $res->free();
                break;
        }
        return $ret;
    }

    function displayEditor(&$tpl, $node)
    {
        $tpl->loadTemplatefile('edit.tpl');
        if ($node != '__new__') {
            $contents = Wiki::getNodeContents($node);
        }
        if ($contents === null) {
            // new node
            $tpl->setVariable("NewOrEdit", "New");
            $nodename = "new node";
            if ($node == '__new__') {
                $node = "";
            }
            $new = true;
        } else {
            $tpl->setVariable("NewOrEdit", "Edit");
            $nodename = Wiki::formatWord($node);
            $new = false;
        }
        $tpl->setVariable("NodeName", $nodename);
        $tpl->setVariable("PageTitle", "PEAR Wiki Editor: $nodename");
        $form = &Wiki::buildEditForm($node, $new);
        $tpl->setVariable("EditForm", $form->toHtml());
        $tpl->show();
    }

    function displayNode(&$tpl, $node)
    {
        if ($node == 'RootNode') {
            // hack to display a default Root node
            $contents = Wiki::getNodeContents($node);
            if ($contents === null) {
                $contents = '(Empty Root Node)';
            }
        }
        $nodename = Wiki::formatWord($node);
        if (empty($contents)) {
            $contents = Wiki::getNodeContents($node);
        }
        if ($contents === null) {
            $tpl->loadTemplatefile('404.tpl');
        } else {
            $tpl->loadTemplatefile('node.tpl');
            $tpl->setVariable('Contents', Wiki::process($contents));
        }
        $tpl->setVariable('User', $GLOBALS['a']->getUsername());
        $tpl->setVariable('Self', $_SERVER['SCRIPT_NAME']);
        $tpl->setVariable('Version', PEAR_WIKI_VERSION);
        $tpl->setVariable('Node', $node);
        $tpl->setVariable('NodeName', $nodename);
        $tpl->setVariable('PageTitle', "PEAR Wiki: $nodename");
        $tpl->show();
    }

    function getNodeContents($node)
    {
        global $dbh;
        if (empty($dbh)) {
            return null;
        }
        return $dbh->getOne('SELECT content FROM nodes WHERE name = ?',
                            array($node));
    }

    function &buildEditForm($node, $new)
    {
        include_once 'HTML/QuickForm.php';
        $form =& new HTML_QuickForm('editForm', 'POST');
        $form->clearAllTemplates();
        $constants['node'] = $node;
        $defaults['contents'] = Wiki::getNodeContents($node);
        $form->setConstants($constants);
        $form->setDefaults($defaults);
        $form->addData('<table border="0" cellpadding="0" cellspacing="2" bgcolor="#eeeeee">');
        $form->addData('<tr><td colspan="2" align="left">Node:');
        if ($new) {
            $form->addElement('text', 'node', null, 'size="60"');
            $form->addRule('node', 'Must have a node name', 'required', null, 'client');
        } else {
            $form->addElement('hidden', 'node', $node);
            $form->addData("<tt>$node</tt>");
        }
        $form->addData('</td></tr><tr><td align="center" colspan="2">');
        $form->addElement('textarea', 'contents', null, 'cols="60" rows="20" wrap="virtual"');
        $form->addData('</td></tr><tr><td align="center" colspan="2">');
        $form->addElement('submit', 'mode', 'submit');
        $form->addData('</td></tr></table>');
        return $form;
    }

    function storeNode($node, $contents)
    {
        global $dbh, $logger, $a;
        $now = time();
        $sql = 'UPDATE nodes SET content = ?, mtime = ? WHERE name = ?';
        $dbh->query($sql, array($contents, $now, $node));
        if ($dbh->affectedRows() == 0) {
            $sql = 'INSERT INTO nodes VALUES(?,?,?,?)';
            $id = $dbh->nextId('nodes');
            $ret = $dbh->query($sql, array($node, $id, $contents, $now));
            $logger->log($a->getUsername() . " added $node");
        } else {
            $logger->log($a->getUsername() . " modified $node");
        }
        return $ret;
    }

    function deleteNode($node)
    {
        global $dbh, $logger, $a;
        $sql = 'DELETE FROM nodes WHERE name = ?';
        $logger->log($a->getUsername() . " deleted $node");
        return $dbh->query($sql, array($node));
    }
}

?>