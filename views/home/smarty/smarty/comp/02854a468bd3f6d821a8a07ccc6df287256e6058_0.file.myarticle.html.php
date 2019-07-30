<?php
/* Smarty version 3.1.33, created on 2019-07-22 06:14:45
  from 'C:\xampp\htdocs\MessageBook\back\smarty\smarty\temp\myarticle.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d3538359119e3_84190431',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '02854a468bd3f6d821a8a07ccc6df287256e6058' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MessageBook\\back\\smarty\\smarty\\temp\\myarticle.html',
      1 => 1563768743,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d3538359119e3_84190431 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <title>我的文章</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {
            height: 914px
        }

        /* Set gray background color and 100% height */
        .sidenav {
            padding-top: 20px;
            background-color: #f1f1f1;
            height: 100%;
        }

        #messagetable {
            padding: 30px;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="../../back/controller/index.php">首頁</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <?php echo $_smarty_tpl->tpl_vars['head']->value;?>

                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav"></div><!-- 右邊灰色區 -->
            <div class="col-sm-8 text-left">
                <div class="container" id='messagetable'>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>主題</th>
                                <th>發佈時間</th>
                                <th>修改</th>
                            </tr>
                        </thead>
                        <tbody id='buildmyarticle'>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-2 sidenav"></div><!-- 左邊灰色區 -->
        </div>
    </div>
    <?php echo '<script'; ?>
>
        $().ready(function () {
            function getUrlParam(name) {
                var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
                var r = window.location.search.substr(1).match(reg);
                if (r != null) return decodeURI(r[2]);
                return null;
            }
            let page = getUrlParam('page')
            $.ajax({
                url: '../../back/controller/myarticleback.php?page=' + page,
                type: "GET",
                dataType: "html",
                success: function (result) {
                    if (typeof (result) == 'string') {
                        $('#buildmyarticle').append(result)
                    } else {

                    }
                }
            });
        })

    <?php echo '</script'; ?>
>
</body>

</html><?php }
}
