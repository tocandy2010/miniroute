<?php
/* Smarty version 3.1.33, created on 2019-07-28 18:22:18
  from 'D:\xampp\htdocs\MessageBook\back\smarty\smarty\temp\message\newarticle.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d3dcbbadcf754_93681673',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '893f14bd92127409e8173845521f6fec8b4b69ac' => 
    array (
      0 => 'D:\\xampp\\htdocs\\MessageBook\\back\\smarty\\smarty\\temp\\message\\newarticle.html',
      1 => 1564330930,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:D:\\xampp\\htdocs\\MessageBook\\back\\public\\header.html' => 1,
  ),
),false)) {
function content_5d3dcbbadcf754_93681673 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- <!DOCTYPE html>
<html lang="en">

<head>
    <title>留言版</title>
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
            height: 915px
        }

        /* Set gray background color and 100% height */
        .sidenav {
            padding-top: 20px;
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }

            .row.content {
                height: auto;
            }
        }

        #title {
            text-align: center
        }

        .errorred {
            color: darkred;
        }

        #contenttext {
            resize: none;
            overflow-Y: scroll;
        }

        .lenerror {
            display: none;
            color: darkred;
        }

        #user {
            font-size: 20px;
            color: white;
            cursor: default;
            position: absolute;
            top: 20%
        }
    </style>
</head> -->
<?php $_smarty_tpl->_subTemplateRender('file:D:\xampp\htdocs\MessageBook\back\public\header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'發佈文章'), 0, false);
?>
<header>
    <style>
        
        #messagetable {
            padding: 30px;
            font-size: 20px;
        }

        #page {
            position: relative;
            top: -20%;
            left: 0%;
        }

        #showtitle {
            width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
        }

        td {
            width: 33%;
        }

        #user {
            font-size: 20px;
            color: white;
            cursor: default;
            position: absolute;
            top: 10px;
        }
    </style>
</header>


<!-- <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../../back/controller/index.php">Home</a>
                <?php if ($_smarty_tpl->tpl_vars['loginflag']->value) {?>
                <span id='user'>歡迎登入&nbsp&nbsp&nbsp<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['userName'];?>
</span>
                <?php }?>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <?php if ($_smarty_tpl->tpl_vars['loginflag']->value) {?>
                    <li><a href='../../back/controller/newarticle.php'><span></span>發佈文章</a></li>;
                    <li><a href='../../back/controller/myarticle.php'><span></span>已發佈文章</a></li>;
                    <li><a href='../../back/controller/editreg.php'><span></span>修改會員</a></li>;
                    <li><a href='../../back/controller/logout.php'><span></span>登出</a></li>;
                    <?php } else { ?>
                    <li><a href='../../back/controller/login.php'><span></span>登入</a></li>;
                    <li><a href='../../back/controller/reg.php'><span></span>註冊</a></li>;
                    <?php }?>
                </ul>
            </div>
        </div>
    </nav> -->
<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
        </div>
        <div class="col-sm-8 text-left">
            <form class="form-horizontal" id='articleform'>
                <fieldset>
                    <!-- Form Name -->
                    <legend id='title'>
                        <h2>發佈新文章</h2>
                    </legend>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="title">標題</label>
                        <div class="col-md-4">
                            <input id="titletext" name="title" spellcheck="false" type="text" placeholder=""
                                class="form-control input-md">
                            <span class="help-block">文字上限&nbsp:&nbsp<span id='titlelength'>30</span><span
                                    class='lenerror' id="titlelenerror">已到達文字上限</span></span>
                            <span class='errorred' id="titleInfo">&nbsp</span>
                        </div>
                    </div>

                    <!-- Textarea -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="content">文章內容</label>
                        <div class="col-md-4">
                            <textarea class="form-control" spellcheck="false" id="contenttext" rows="25"
                                name="content"></textarea>
                            <span class="help-block">文字上限&nbsp:&nbsp<span id='contentlength'>1000</span><span
                                    class='lenerror' id="contentlenerror">已到達文字上限</span></span>
                            <span class='errorred' id="contentInfo">&nbsp</span>
                        </div>
                    </div>

                    <!-- Button (Double) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for=""></label>
                        <div class="col-md-8">
                            <button id="articlesend" type='button' class="btn btn-success">發佈</button>
                            <a href='./index.php'><button id="" type='button' class="btn btn-danger">取消</button></a>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="col-sm-2 sidenav">
            <div></div>
            <div></div>
        </div>
    </div>
</div>
<?php echo '<script'; ?>
>
    $("#articlesend").click(function () {

        let title = $('#titletext').val();
        let content = $('#contenttext').val();
        if (title.trim() == "") {
            $('#titleInfo').html("未填");
            return false;
        } else {
            $('#titleInfo').html("&nbsp");
        }

        if (content.trim() == "") {
            $('#contentInfo').html("未填");
            return false;
        } else {
            $('#contentInfo').html("&nbsp");
        }

        let res = ['title', 'content', 'error'];
        for (error of res) {
            $('#' + error + 'Info').html("&nbsp");
        }
        $.ajax({
            url: "../../back/controller/newarticleback.php",
            type: "POST",
            dataType: "json",
            data: {
                title: $('#titletext').val(),
                content: $('#contenttext').val(),
            },
            success: function (result) {
                if (result.notlogin) {
                    alert('請先登入會員');
                    $(window).attr('location', './login.php');
                } else if (result.success) {
                    alert(result.success);
                    $(window).attr('location', './index.php');
                } if (result) {
                    for (error of res) {
                        $('#' + error + 'Info').html(result[error]);
                    }
                } else {
                    alert('發佈失敗');
                    $(window).attr('location', './index.php');
                }
            }
        });
    });
    let titleflag = true;
    let contentflag = true;
    $('#titletext').keyup(function () {
        let maxtitlelen = 30;
        let inplen = $('#titletext').val();
        if (inplen.length <= maxtitlelen) {
            $('#titlelength').html(maxtitlelen - inplen.length);
            $('#titlelenerror').attr("style", 'display:none');
            titleflag = true;
        } else {
            $('#titlelength').html(maxtitlelen - inplen.length);
            $('#titlelenerror').attr("style", 'display:inline-block');
            titleflag = false;
        }
        checkwordlen(titleflag, contentflag);
    })

    $('#contenttext').keyup(function () {
        let maxcontentlen = 1000;
        let inplen = $('#contenttext').val();
        if (inplen.length <= maxcontentlen) {
            $('#contentlength').html(maxcontentlen - inplen.length);
            $('#contentlenerror').attr("style", 'display:none');
            contentflag = true;
        } else {
            $('#contentlength').html(maxcontentlen - inplen.length);
            $('#contentlenerror').attr("style", 'display:inline-block');
            contentflag = false;
        }
        checkwordlen(titleflag, contentflag);
    })

    function checkwordlen(titleflag, contentflag) {
        if ((titleflag === true) && (contentflag === true)) {
            $('#articlesend').attr("disabled", false);
        } else {
            $('#articlesend').attr("disabled", true);
        }
    }


<?php echo '</script'; ?>
>
</body>

</html><?php }
}
