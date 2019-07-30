<?php
/* Smarty version 3.1.33, created on 2019-07-29 15:42:30
  from 'D:\xampp\htdocs\MessageBook\back\smarty\smarty\temp\message\meyarticleedit.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d3ef7c66e34a6_40706366',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd16a0e64f7b7ef43baed7b311456d51d6ebc289a' => 
    array (
      0 => 'D:\\xampp\\htdocs\\MessageBook\\back\\smarty\\smarty\\temp\\message\\meyarticleedit.html',
      1 => 1564407741,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:\\xampp\\htdocs\\MessageBook\\back\\public\\header.html' => 1,
  ),
),false)) {
function content_5d3ef7c66e34a6_40706366 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:\xampp\htdocs\MessageBook\back\public\header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'修改文章'), 0, false);
?>
<header>
    <style>
        #contenttext {
            resize: none;
            overflow-Y: scroll;
        }

        .lenerror {
            display: none;
            color: darkred;
        }
    </style>
</header>
<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav"></div>
        <div class="col-sm-8 text-left">
            <form class="form-horizontal" action='' method='' id='articleeditform'>
                <fieldset>
                    <!-- Form Name -->
                    <legend id='title'>
                        <h2>修改文章</h2>
                    </legend>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="title">標題</label>
                        <div class="col-md-4">
                            <input id="titletext" name="title" spellcheck="false" type="text" placeholder=""
                                class="form-control input-md" value="<?php echo $_smarty_tpl->tpl_vars['contentinfo']->value['title'];?>
">
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
                                name="content"><?php echo $_smarty_tpl->tpl_vars['contentinfo']->value['content'];?>
</textarea>
                            <span class="help-block">文字上限&nbsp:&nbsp<span id='contentlength'>1000</span><span
                                    class='lenerror' id="contentlenerror">已到達文字上限</span></span>
                            <span class='errorred' id="contentInfo">&nbsp</span>
                        </div>
                    </div>

                    <!-- Button (Double) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for=""></label>
                        <div class="col-md-8">
                            <button id="articlesend" type='button' class="btn btn-success">修改</button>
                            <a href='./myarticle.php'><button id="" type='button' class="btn btn-danger">取消</button></a>
                            <span class='errorred' id="errorInfo">&nbsp</span>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="col-sm-2 sidenav">
        </div>
    </div>
</div>
</div>
<?php echo '<script'; ?>
>
    let getconid;

    $().ready(function () {
        let res = ['title', 'content'];
        function getUrlParam(name) {
            var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
            var r = window.location.search.substr(1).match(reg);
            if (r != null) return decodeURI(r[2]);
            return null;
        }
        getconid = getUrlParam('conid');

        let titlelen = $('#titletext').val().length;
        $('#titlelength').html(30 - titlelen);
        let contentlen = $('#contenttext').val().length;
        $('#contentlength').html(1000 - contentlen);

    });

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
            url: "../../back/controller/myarticleeditback.php",
            type: "post",
            dataType: "json",
            data: {
                title: $('#titletext').val(),
                content: $('#contenttext').val(),
                editconid: getconid
            },
            success: function (result) {
                if (result.notanyedit) {
                    alert(result.notanyedit)
                    $(window).attr('location', './myarticle.php');
                } else if (result.success) {
                    alert(result.success);
                    $(window).attr('location', './myarticle.php');
                } else if (result.notlogin) {
                    alert(result.notlogin);
                    $(window).attr('location', './login.php');
                } else if (result.notmyarticle) {
                    alert(result.notmyarticle);
                    $(window).attr('location', './myarticle.php');
                }else if (result) {
                    for (error of res) {
                        $('#' + error + 'Info').html(result[error]);
                    }
                } else {
                    alert('修改失敗');
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
