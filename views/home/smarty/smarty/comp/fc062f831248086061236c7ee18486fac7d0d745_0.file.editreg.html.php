<?php
/* Smarty version 3.1.33, created on 2019-07-29 14:12:22
  from 'D:\xampp\htdocs\MessageBook\back\smarty\smarty\temp\login\editreg.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d3ee2a6c58047_82612442',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fc062f831248086061236c7ee18486fac7d0d745' => 
    array (
      0 => 'D:\\xampp\\htdocs\\MessageBook\\back\\smarty\\smarty\\temp\\login\\editreg.html',
      1 => 1564402259,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:\\xampp\\htdocs\\MessageBook\\back\\public\\header.html' => 1,
  ),
),false)) {
function content_5d3ee2a6c58047_82612442 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:\xampp\htdocs\MessageBook\back\public\header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'留言版登入'), 0, false);
?>
<header>
    <style>
        #edit {
            position: relative;
            left: 30%;
            bottom: 30%;
            width: 40%;
            height: 40%;
            position: fixed;
        }

        #info {
            position: absolute;
            left: 0%;
            border: 1px solid black;
            width: 30%;
            height: 30%;
            text-align: center;
            line-height: 100px;
            font-size: 30px;
            border-radius: 15px;
            color: steelblue
        }

        .mouseover:hover {
            background-color: orange;
            box-shadow: 3px 3px 5px 6px #cccccc;
            cursor: pointer;
        }

        #password {
            border: 1px solid black;
            position: absolute;
            left: 50%;
            width: 30%;
            height: 30%;
            text-align: center;
            line-height: 100px;
            font-size: 30px;
            border-radius: 15px;
            color: steelblue
        }
    </style>
</head>
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav">

            </div>
            <div class="col-sm-8 text-left">
                <div id='edit'>
                    <a href='./editinfo.php'>
                        <div id='info' class='mouseover'>註冊資訊</div>
                    </a>
                    <a href='./editpassword.php'>
                        <div id='password' class='mouseover'>修改密碼</div>
                    </a>

                </div>
            </div>
            <div class="col-sm-2 sidenav">

            </div>

        </div>
    </div>
</body>

</html><?php }
}
