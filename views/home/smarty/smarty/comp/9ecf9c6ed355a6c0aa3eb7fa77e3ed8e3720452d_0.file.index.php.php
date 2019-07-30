<?php
/* Smarty version 3.1.33, created on 2019-07-27 19:26:52
  from 'D:\xampp\htdocs\MessageBook\back\controller\index.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d3c895c9a87a2_11779482',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9ecf9c6ed355a6c0aa3eb7fa77e3ed8e3720452d' => 
    array (
      0 => 'D:\\xampp\\htdocs\\MessageBook\\back\\controller\\index.php',
      1 => 1564226871,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d3c895c9a87a2_11779482 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php

';?>require_once("../smarty/smarty/public/Mysmarty.php");
require_once("../model/ContentModel.php");
require_once("../public/Pagetool.php");
require_once("../model/Member.php");
require_once("../public/Commontool.php");

$commontool = new Commontool();
$content = new ContentModel();
$smarty = new Mysmarty();
$member  = new Member();

if (!isset($_COOKIE['token']) || empty($_COOKIE['token'])) {
    $userinfo = [];
} else {
    $userinfo = $member->getUser($_COOKIE['token']);
    $userinfo = empty($userinfo) ? [] : $userinfo;
}

$loginflag = !empty($userinfo);

if (!isset($_GET['page']) || is_null($_GET['page']) || !(is_numeric($_GET['page'])) || $_GET['page'] < 1) {
    $page['page'] = 1;
} else {
    $page['page'] = $_GET['page'];
}

$allcontent = $content->getAllContent('content');

$contentlength = 5;

if ($page['page'] > ceil(count($allcontent) / $contentlength)) {
    $page['page'] = 1;
}

$contentdata = $content->showContent($page['page'], $contentlength);

$contentdata = $commontool->useTaiwanTime($contentdata, 'createTime');

$pagetool = new Pagetool(count($allcontent), $page['page'], $contentlength);

$showpage = $pagetool->show();

$smarty->assign('loginflag',$loginflag);

$smarty->assign('showpage',$showpage);

$smarty->assign('pagenum',$page['page']);

$smarty->assign('userinfo',$userinfo);

$smarty->assign('contentdata',$contentdata);

$smarty->display('./message/index.html');

<?php }
}
