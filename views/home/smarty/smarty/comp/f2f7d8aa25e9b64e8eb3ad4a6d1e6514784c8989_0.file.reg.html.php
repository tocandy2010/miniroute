<?php
/* Smarty version 3.1.33, created on 2019-07-29 14:37:46
  from 'D:\xampp\htdocs\MessageBook\back\smarty\smarty\temp\login\reg.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d3ee89a5b9628_66156042',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f2f7d8aa25e9b64e8eb3ad4a6d1e6514784c8989' => 
    array (
      0 => 'D:\\xampp\\htdocs\\MessageBook\\back\\smarty\\smarty\\temp\\login\\reg.html',
      1 => 1564403865,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:\\xampp\\htdocs\\MessageBook\\back\\public\\header.html' => 1,
  ),
),false)) {
function content_5d3ee89a5b9628_66156042 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:\xampp\htdocs\MessageBook\back\public\header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'留言版註冊'), 0, false);
?>
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav"></div>
            <div class="col-sm-8 text-left">
                <form class="form-horizontal" id='regform'>
                    <fieldset>
                        <!-- Form Name -->
                        <legend id='title'>
                            <h2>留言版註冊</h2>
                        </legend>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="">帳號</label>
                            <div class="col-md-4">
                                <input id="account" name="account" type="text" autocomplete="off"
                                    class="form-control input-md">
                                <span class="help-block">請輸入6~20位數 英文+數字&nbsp&nbsp&nbsp禁止輸入任何符號</span>
                                <span class='errorred' id='accountInfo'>&nbsp</span>
                            </div>
                        </div>

                        <!-- Password input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="">密碼</label>
                            <div class="col-md-4">
                                <input id="password" name="password" type="password" placeholder=""
                                    class="form-control input-md">
                                <span class="help-block">請輸入6~20位數 英文+數字&nbsp&nbsp&nbsp禁止輸入任何符號</span>
                                <span class='errorred' id='passwordInfo'>&nbsp</span>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="">確認密碼</label>
                            <div class="col-md-4">
                                <input id="repassword" name="repassword" type="password" placeholder=""
                                    class="form-control input-md">
                                <span class="help-block">與密碼相同</span>
                                <span class='errorred' id='repasswordInfo'>&nbsp</span>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">姓名</label>
                            <div class="col-md-4">
                                <input id="userName" name="userName" type="text" autocomplete="off"
                                    class="form-control input-md">
                                <span class="help-block">請輸入姓名&nbsp最大字數限制20個字&nbsp禁止空白</span>
                                <span class='errorred' id='userNameInfo'>&nbsp</span>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="">email</label>
                            <div class="col-md-4">
                                <input id="email" name="email" type="text" autocomplete="off" 
                                class="form-control input-md">
                                <span class="help-block">ex:example@com</span>
                                <span class='errorred' id='emailInfo'>&nbsp</span>
                            </div>
                        </div>

                        <!-- Button (Double) -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for=""></label>
                            <div class="col-md-8">
                                <button id="regsend" type='button' class="btn btn-info">註冊</button>
                                <a href='./login.php'><button type='button' class="btn btn-danger">取消</button></a>
                                <span class='errorred' class id='regerror'></span>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="col-sm-2 sidenav">
            </div>
        </div>
    </div>

    <?php echo '<script'; ?>
>
        $("#regsend").click(function () {
            let account = $('#account').val();
            let password = $('#password').val();
            let repassword = $('#repassword').val();
            let userName = $('#userName').val();
            let email = $('#email').val();

            if (account.trim() === "" || password.trim() === "" || repassword.trim() === "" 
            || userName.trim() === "" || email.trim() === "") {
                $('#regerror').html("還有欄位未填");
                return false;
            } else {
                $('#regerror').html("&nbsp");
            }

            let emailpatt = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;
            if (email.search(emailpatt) === -1) {
                $('#emailInfo').html("請輸入正確的eamil");
                return false;
            } else {
                $('#emailInfo').html("&nbsp");
            }

            let regform = document.getElementById('regform')
            let fd = new FormData(regform);
            let res = ['account', 'password', 'repassword', 'email', 'userName'];
            for (error of res) {
                $('#' + error + 'Info').html("&nbsp");
            }
            $.ajax({
                url: "./regback.php",
                type: "POST",
                dataType: "json",
                data: {
                    account: $('#account').val(),
                    password: $('#password').val(),
                    repassword: $('#repassword').val(),
                    email: $('#email').val(),
                    userName: $('#userName').val(),
                },
                success: function (result) {
                    if (result.success) {
                        alert(result.success)
                        $(window).attr('location', './login.php');
                    } else if (result.fail) {
                        alert(result.fail)
                    } else if(result) {
                        for (error of res) {
                            $('#' + error + 'Info').html(result[error]);
                        }
                    }
                }
            });
        });

        
        let accountflag = true;
        let passwordflag = true;
        let userNameflag = true;
        let repasswordflag = true;

        $('#repassword').blur(function () {
            let password = $('#password').val();
            let repassword = $('#repassword').val();
            if (password !== repassword) {
                repasswordflag = false;
                $('#repasswordInfo').html('確認密碼與密碼不相同');
            } else {
                repasswordflag = true;
                $('#repasswordInfo').html('&nbsp');
            }
            luckButton(accountflag, passwordflag, userNameflag, repasswordflag);
        })

        $('#account').keyup(function () {
            let patt = /[^a-zA-Z0-9]/;
            let str = $(this).val();
            if (patt.test(str) || !(str.length <= 20) || !(str.length >= 6)) {
                accountflag = false;
                $(this).next().attr('style', 'color:darkred')
            } else {
                accountflag = true;
                $(this).next().attr('style', "color:gray");
            }
            luckButton(accountflag, passwordflag, userNameflag, repasswordflag);
        });

        $('#password').keyup(function () {
            let patt = /[^a-zA-Z0-9]/;
            let str = $(this).val();
            if (patt.test(str) || !(str.length <= 20) || !(str.length >= 6)) {
                passwordflag = false;
                $(this).next().attr('style', 'color:darkred');
            } else {
                passwordflag = true;
                $(this).next().attr('style', "color:gray");
            }
            luckButton(accountflag, passwordflag, userNameflag, repasswordflag);
        });

        $('#userName').keyup(function() {
                let str = $(this).val();
                for(let i = 0; i < str.length; i++) {
                    if (str.substring(i,i+1) === " " || str.length > 20) {
                        userNameflag = false;
                        $(this).next().attr('style', 'color:darkred');
                        break;
                    }
                        userName = true;
                        $(this).next().attr('style', "color:gray");
                }
                luckButton(accountflag, passwordflag, userNameflag, repasswordflag);
            })

        function luckButton(accountflag, passwordflag, userNameinfo, repasswordflag) {
            if (accountflag && passwordflag && userNameflag && repasswordflag) {
                $('#regsend').attr('disabled', false);
            } else {
                $('#regsend').attr('disabled', true);
            }
        }

    <?php echo '</script'; ?>
>
</body>

</html><?php }
}
