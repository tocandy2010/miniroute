<?php
/* Smarty version 3.1.33, created on 2019-07-29 08:02:29
  from 'C:\xampp\htdocs\MessageBook\back\smarty\smarty\temp\login\reg.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d3e8bf5b8ba44_78044873',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4ec4fceecc129a9b8cdc6e05ada7f13beb9232e7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MessageBook\\back\\smarty\\smarty\\temp\\login\\reg.html',
      1 => 1564380148,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:\\xampp\\htdocs\\MessageBook\\back\\public\\header.html' => 1,
  ),
),false)) {
function content_5d3e8bf5b8ba44_78044873 (Smarty_Internal_Template $_smarty_tpl) {
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

        $('#repassword').blur(function () {
            let password = $('#password').val();
            let repassword = $('#repassword').val();
            if (password !== repassword) {
                $('#repasswordInfo').html('確認密碼與密碼不相同');
            } else {
                $('#repasswordInfo').html('&nbsp');
            }
        })

        let accountflag = true;
        let passwordflag = true;
        let userName = true;

        $('#account').keyup(function () {
            let patt = /[^a-zA-Z0-9]/;
            let strlen = $(this).val().length;
            if (patt.test(this.value) || !(strlen < 20) || !(strlen > 5)) {
                accountflag = false;
                $(this).next().attr('style', 'color:darkred')
            } else {
                accountflag = true;
                $(this).next().attr('style', "color:gray");
            }
            LuckButton(accountflag, passwordflag);
        });

        $('#password').keyup(function () {
            let patt = /[^a-zA-Z0-9]/;
            let strlen = $(this).val().length;
            if (patt.test(this.value) || !(strlen < 20) || !(strlen > 5)) {
                passwordflag = false;
                $(this).next().attr('style', 'color:darkred')
            } else {
                passwordflag = true;
                $(this).next().attr('style', "color:gray");
            }
            LuckButton(accountflag, passwordflag);
        });

        $('#userName').keyup(function() {
                let strlen = $(this).val().length;
                let str = $(this).val();
                for(let i = 0; i < strlen; i++) {
                    if (str.substring(i,i+1) === " " || strlen > 20) {
                        userName = false;
                        $(this).next().attr('style', 'color:darkred');
                        break;
                    }
                        userName = true;
                        $(this).next().attr('style', "color:gray");
                }
                LuckButton(accountflag, passwordflag, userName);
            })

        function LuckButton(accountflag, passwordflag) {
            if (accountflag && passwordflag && userName) {
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
