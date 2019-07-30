<?php
/* Smarty version 3.1.33, created on 2019-07-21 21:54:15
  from 'D:\xampp\htdocs\MessageBook\back\smarty\smarty\temp\content.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d346e8798b9d1_33678007',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '566dd23d77374f1afb5fb04eb4c0b07b26a3238e' => 
    array (
      0 => 'D:\\xampp\\htdocs\\MessageBook\\back\\smarty\\smarty\\temp\\content.html',
      1 => 1563716908,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d346e8798b9d1_33678007 (Smarty_Internal_Template $_smarty_tpl) {
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

        #message {
            padding: 0px 50px 0px 50px;
        }
        #leavemessage{
            position: relative;
            right:20%;
        }
        #lmtextarea{
            width:200%;
            height:100px;
            resize:none;
            overflow-y:scroll;
        }
        .errorred {
            color: darkred;
        }

        #messagelenerror{
            display: none;
        }
        #messagetext{
            resize: none;
            overflow-Y:scroll;
            width:200%;
        }
        .messagetime{
            display: inline-block;
            width:90%;
            text-align: right
        }

    </style>
</head>

<body>
<?php echo '<?php ';?>include_once('../public/head.php') <?php echo '?>';?>
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav"></div><!-- 右邊灰色區 -->
            <div class="col-sm-8 text-left">
                <div id='message'>
                    <h2><?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
</h2>
                    <hr>
                    <p><?php echo $_smarty_tpl->tpl_vars['data']->value['content'];?>
</p>
                </div>
                <hr>
                <div id='leavemessage'><!-- 留言表單區 -->
                    <form class="form-horizontal" id='messageform'>
                        <fieldset>
                            <!-- Textarea -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="textarea">留言</label>
                                <div class="col-md-4">
                                    <textarea class="form-control" spellcheck ="false" id="messagetext" name="message"></textarea>
                                    <span class="help-block">最大字數限制<span id='messagelength'>10</span></span>
                                    <span id='messageInfo' class='errorred' class="help-block"></span>
                                </div>
                            </div>

                            <!-- Button (Double) -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="button1id"></label>
                                <div class="col-md-8">
                                    <button id="messagesend"  type='button' class="btn btn-info">留言</button>
                                    <input type="reset" class="btn btn-default" value='清除'>
                                    <span id='messagelenerror' class='errorred'>超過最大字數限制</span>
                                </div>
                            </div>

                        </fieldset>
                    </form>
                </div>

                <div class="container">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allmessage']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
                        <div class="panel panel-default">
                            <div class="panel-heading"><?php echo $_smarty_tpl->tpl_vars['v']->value['userName'];?>
(<?php echo $_smarty_tpl->tpl_vars['v']->value['account'];?>
)<span class='messagetime'><?php echo $_smarty_tpl->tpl_vars['v']->value['createtime'];?>
</span></div>
                            <div class="panel-body"><?php echo $_smarty_tpl->tpl_vars['v']->value['message'];?>
</div>
                        </div>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>

            </div>
            <div class="col-sm-2 sidenav"></div><!-- 左邊灰色區 -->
        </div>
    </div>
    <?php echo '<script'; ?>
>
        $("#messagesend").click(function() {
            let messageform = document.getElementById('messageform')
            let fd = new FormData(messageform);
            fd.append('conid',<?php echo $_smarty_tpl->tpl_vars['conid']->value;?>
)
            let res = ['message'];
            for (error of res) {
                $(`#${error}Info`).html("");
            }
            $.ajax({
                url: "../../back/controller/message.php",
                type: "POST",
                dataType: "json",
                contentType: false,
                processData: false,
                data: fd,
                success: function(result) {
                    if(typeof(result) == 'object'){
                        for (error of res) {
                            $(`#${error}Info`).html(result[error]) ;
                        }
                    }else if(result == 1){
                        location.reload();
                    }
                }
            });
        });

        $('#messagetext').keyup(function() {
            let inplen = $('#messagetext').val();
            if (inplen.length <= 10) {
                $('#messagelength').html(10 - inplen.length);
                $('#messagelenerror').attr("style", 'display:none');
                $('#messagesend').attr('disabled',false)
            } else {
                $('#messagelength').html(0);
                $('#messagelenerror').attr("style", 'display:inline-block');
                $('#messagesend').attr('disabled',true)
            }
        })
    <?php echo '</script'; ?>
>
</body>

</html><?php }
}
