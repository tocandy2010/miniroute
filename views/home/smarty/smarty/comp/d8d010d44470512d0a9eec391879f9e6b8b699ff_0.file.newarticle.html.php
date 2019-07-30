<?php
/* Smarty version 3.1.33, created on 2019-07-22 06:07:51
  from 'C:\xampp\htdocs\MessageBook\back\smarty\smarty\temp\newarticle.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d3536977d5711_87643465',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd8d010d44470512d0a9eec391879f9e6b8b699ff' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MessageBook\\back\\smarty\\smarty\\temp\\newarticle.html',
      1 => 1563768469,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d3536977d5711_87643465 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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
        #title {
            text-align: center
        }

        .errorred {
            color: darkred;
        }

        #contenttext {
            resize: none;
            overflow-Y:scroll;
        }
        .lenerror{
            display:none;
            color:darkred;
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
    <form class="form-horizontal" action='' method='' id='articleform'>
        <fieldset>
            <!-- Form Name -->
            <legend id='title'>
                <h2>發佈新文章</h2>
            </legend>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="title">標題</label>
                <div class="col-md-4">
                    <input id="titletext" name="title" spellcheck="false" type="text" placeholder="" class="form-control input-md">
                    <span class="help-block">文字上限&nbsp:&nbsp<span id='titlelength'>10</span><span class='lenerror' id="titlelenerror">已到達文字上限</span></span>
                    <span class='errorred' id="titleInfo"></span>
                </div>
            </div>

            <!-- Textarea -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="content">文章內容</label>
                <div class="col-md-4">
                    <textarea class="form-control" spellcheck="false" id="contenttext" rows="25" name="content"></textarea>
                    <span class="help-block">文字上限&nbsp:&nbsp<span id='contentlength'>10</span><span class='lenerror' id="contentlenerror">已到達文字上限</span></span>
                    <span class='errorred' id="contentInfo"></span>
                </div>
            </div>

            <!-- Button (Double) -->
            <div class="form-group">
                <label class="col-md-4 control-label" for=""></label>
                <div class="col-md-8">
                    <button id="articlesend" type='button' class="btn btn-success">發佈</button>
                    <a href='./index.php'><button id=""  type='button' class="btn btn-danger">取消</button></a>
                </div>
            </div>
        </fieldset>
    </form>
    </div>
    <?php echo '<script'; ?>
>
    $("#articlesend").click(function() {
            let articleform = document.getElementById('articleform')
            let fd = new FormData(articleform);
            let res = ['title', 'content','error'];
            for (error of res) {
                $(`#${error}Info`).html("");
            }
            $.ajax({
                url: "../../back/controller/article.php",
                type: "POST",
                dataType: "json",
                contentType: false,
                processData: false,
                data: fd,
                success: function(result) {
                    if(typeof(result) == 'object'){
                        for (error of res) {
                            $(`#${error}Info`).html(result[error]);
                        }
                    }else if(result == 1){
                        alert('成功發佈');
                        $(window).attr('location','./index.php');
                    }else{
                        $(`#errorInfo`).html("發佈失敗");
                    }
                }
            });
        });
        let titleflag = true;
        let contentflag = true;
        $('#titletext').keyup(function(){
            let inplen = $('#titletext').val();
            //let titlelen = $('#titlelength').html();
            if(inplen.length<=10){
                $('#titlelength').html(10-inplen.length);
                $('#titlelenerror').attr("style", 'display:none');     
                titleflag = true;       
            }else{
                $('#titlelength').html(0);
                $('#titlelenerror').attr("style", 'display:inline-block');
                titleflag = false;
            }
            checkwordlen(titleflag,contentflag);
        })
        
        $('#contenttext').keyup(function(){
            let inplen = $('#contenttext').val();
            if(inplen.length<=10){
                $('#contentlength').html(10-inplen.length);
                $('#contentlenerror').attr("style", 'display:none');
                contentflag = true; 
            }else{
                $('#contentlength').html(0);
                $('#contentlenerror').attr("style", 'display:inline-block');
                contentflag = false;
            }
            checkwordlen(titleflag,contentflag);
        })

        function checkwordlen(a,b){
            if((titleflag===true) && (contentflag===true)){
                $('#articlesend').attr("disabled", false);
            }else{               
                $('#articlesend').attr("disabled",true);
            }
        }

    
    <?php echo '</script'; ?>
>
</body>

</html><?php }
}
