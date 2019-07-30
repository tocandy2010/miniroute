<?php
/* Smarty version 3.1.33, created on 2019-07-22 12:14:41
  from 'C:\xampp\htdocs\MessageBook\back\smarty\smarty\temp\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d3538311d4b05_35671256',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '11e1be5064904d44cb3adc7917f67af063e393d8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MessageBook\\back\\smarty\\smarty\\temp\\index.html',
      1 => 1563768875,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d3538311d4b05_35671256 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <title>留言板首頁</title>
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
            height: 880px
        }

        /* Set gray background color and 100% height */
        .sidenav {
            padding-top: 20px;
            background-color: #f1f1f1;
            height: 104%;
        }

        #messagetable {
            padding: 30px;
            font-size: 20px;
        }

        #page{
            width:40%;
            position: absolute;
            top:90%;
            left:40%
        }

        .nowpage{
            color: red; 
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
                                <th>發佈者</th>
                                <th>發佈時間</th>
                            </tr>
                        </thead>
                        <tbody id='buildindex'>
                        <?php echo $_smarty_tpl->tpl_vars['contentdata']->value;?>

                        </tbody>
                    </table>                    
                </div>
            </div>
            <div class="col-sm-2 sidenav"></div><!-- 左邊灰色區 -->
        </div>
    </div>

    <div class="container" id='page'>
        <ul class="pagination" id='pageul'></ul>
    </div>

    <?php echo '<script'; ?>
>
        
        function showpage(page){
            function getUrlParam(name) {
                var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
                var r = window.location.search.substr(1).match(reg);
                if (r != null) return decodeURI(r[2]);
                return 1;
            }
            let pagenum = getUrlParam('page')
            $.ajax({
                url: '../../back/controller/page.php?page='+pagenum,
                type: "GET",
                dataType: "html",
                success: function(result) {
                    $('#pageul').append(result)
                }
            });
        }
        function getUrlParam(name) {
                var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
                var r = window.location.search.substr(1).match(reg);
                if (r != null) return decodeURI(r[2]);
                return 1;
        }
        showpage(getUrlParam('page'))
    <?php echo '</script'; ?>
>

</body>

</html><?php }
}
