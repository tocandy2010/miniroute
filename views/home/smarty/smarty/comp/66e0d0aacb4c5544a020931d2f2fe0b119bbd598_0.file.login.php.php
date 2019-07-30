<?php
/* Smarty version 3.1.33, created on 2019-07-27 19:27:17
  from 'D:\xampp\htdocs\MessageBook\back\controller\login.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d3c8975a53a44_46678820',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '66e0d0aacb4c5544a020931d2f2fe0b119bbd598' => 
    array (
      0 => 'D:\\xampp\\htdocs\\MessageBook\\back\\controller\\login.php',
      1 => 1564164513,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d3c8975a53a44_46678820 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php

';?>require_once("../model/Member.php");
require_once("../smarty/smarty/public/Mysmarty.php");

$smarty = new Mysmarty();
$Member  = new Member();

$userinfo = [];
$loginflag = !empty($userinfo);

if (isset($_COOKIE['remember']) && !empty($_COOKIE['remember'])) {
    $remember = "checked";
    $account = $_COOKIE['remember'];
} else {
    $remember = '';
    $account = '';
}

$smarty->assign('remember',$remember);

$smarty->assign('account',$account);

$smarty->assign('loginflag',$loginflag);

$smarty->display('./login/login.html');
<?php }
}
