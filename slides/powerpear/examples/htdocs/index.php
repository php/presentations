<?php

// PEAR includes
require_once 'HTML/Template/IT.php';

// non-PEAR includes
require 'Wiki.php';

ob_start();

$node = preg_replace(':^/:', '', $_SERVER['PATH_INFO']);
$mode = $_REQUEST['mode'];
$template_dir = dirname(dirname(__FILE__)) . '/templates';

if ($mode == 'submit') {
    if (Wiki::storeNode($_REQUEST['node'], $_REQUEST['contents'])) {
        header("Location: $_SERVER[SCRIPT_NAME]/$_REQUEST[node]");
    } else {
        header("Location: $_SERVER[SCRIPT_NAME]");
    }
    exit;
}

if ($mode == 'logout') {
    $a->logout();
    $a->start();
}

if ($mode == 'delete') {
    Wiki::deleteNode($node);
    header("Location: $_SERVER[SCRIPT_NAME]");
    exit;
}

if ($mode == 'mail') {
    if (empty($_REQUEST['email'])) {
        include_once "HTML/QuickForm.php";
        include_once "HTML/Template/IT.php";
        $form = new HTML_QuickForm($_SERVER['SCRIPT_NAME'], 'GET');
        $form->addElement('text', 'email', null, 'size="40"');
        $form->addRule('email', 'Please enter email address', 'required', null, 'client');
        $form->addElement('submit');
        $form->addElement('hidden', 'mode', $mode);
        $form_html = $form->toHtml();
        $tpl =& new HTML_Template_IT($template_dir);
        $tpl->loadTemplatefile("mail.tpl");
        $tpl->setVariable("Node", $node);
        $tpl->setVariable("MailForm", $form_html);
        $tpl->show();
        exit;
    } else {
        include_once "Mail.php";
        include_once "Mail/mime.php";
        $html = Wiki::process(Wiki::getNodeContents($node));
        $text = unhtmlentities(strip_tags($html));
        $hdrs = array(
            'From'    => $a->getUsername() . '@php.net',
            'Subject' => 'PEAR Wiki: ' . Wiki::formatWord($node),
            );
        $mime = new Mail_mime();
        $mime->setTXTBody($text);
        $mime->setHTMLBody($html);
        $body = $mime->get();
        $hdrs = $mime->headers($hdrs);

        $mail =& Mail::factory('mail');
        $mail->send($_REQUEST['email'], $hdrs, $body);
    }
}

$tpl =& new HTML_Template_IT($template_dir);

if ($mode == 'edit') {
    Wiki::displayEditor($tpl, $node);
} elseif ($mode == 'new') {
    Wiki::displayEditor($tpl, '__new__');
} else {
    if (empty($node)) {
        if (isset($_REQUEST['node'])) {
            $node = $_REQUEST['node'];
        } else {
            $node = 'RootNode';
        }
    }
    Wiki::displayNode($tpl, $node);
}

ob_end_flush();

?>