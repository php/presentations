<?php

require_once 'Auth/Auth.php';
require_once 'HTML/QuickForm.php';

function loginFunction()
{ 
    $form =& new HTML_QuickForm('editForm', 'POST');
    $form->addData('<h1>Please log in!</h1>');
    //$form->addData('<br />User name: ');
    $form->addElement('text', 'username', null, 'size="10"');
    $form->addRule('username', 'Please enter your user name', 'required', null, 'client');
    //$form->addData('<br />Password: ');
    $form->addElement('password', 'password');
    $form->addRule('password', 'Please enter your password', 'required', null, 'client');
    $form->addElement('submit');
    $form->display();
    exit;
}

$auth_options = array(
    'dsn' => $dsn,
    'table' => 'users',
    'usernamecol' => 'username',
    'passwordcol' => 'password',
    );
$a = new Auth("DB", $auth_options, "loginFunction");
$a->start();

?>