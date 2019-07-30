<?php
/* Smarty version 3.1.33, created on 2019-07-29 12:02:14
  from 'C:\xampp\htdocs\MessageBook\back\smarty\smarty\temp\message\myarticle.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d3e6fc611f9e2_66735345',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0c6ad9e6be05b0d202d6d027520e2785507923e2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MessageBook\\back\\smarty\\smarty\\temp\\message\\myarticle.html',
      1 => 1564372921,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:\\xampp\\htdocs\\MessageBook\\back\\public\\header.html' => 1,
  ),
),false)) {
function content_5d3e6fc611f9e2_66735345 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:\xampp\htdocs\MessageBook\back\public\header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'我的文章'), 0, false);
?>
<header>
    <style>
        #messagetable {
            padding: 30px;
            font-size: 20px;
        }

        #showtitle {
            width: 90%;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
        }
    </style>
<header>
    <div class="container-fluid text-center">
            <div class="row content">
                <div class="col-sm-2 sidenav"></div>
                <div class="col-sm-8 text-left">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>主題</th>
                                <th>發佈時間</th>
                                <th>修改</th>
                                <th>刪除</th>
                            </tr>
                        </thead>
                        <tbody id='buildmyarticle'>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mycontent']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
                            <tr>
                                <td style="width:50%"><a href="./content.php?conid=<?php echo $_smarty_tpl->tpl_vars['v']->value['conid'];?>
"><span
                                            id='showtitle'><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</span></a></td>
                                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['createtime'];?>
</td>
                                <td><a href="./myarticleedit.php?conid=<?php echo $_smarty_tpl->tpl_vars['v']->value['conid'];?>
"><button type="button"
                                            class="btn btn-success">編輯</button></a></td>
                                <td><span class='delcontnet' data-title="<?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
"
                                        data-conid="<?php echo $_smarty_tpl->tpl_vars['v']->value['conid'];?>
"><button type="button"
                                            class="btn btn-danger">刪除</button><span></span></td>
                            </tr>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-2 sidenav"></div>
            </div>
        </div>
    <?php echo '<script'; ?>
>

        $(".delcontnet").click(function () {
            let title = this.getAttribute('data-title');
            let conid = this.getAttribute('data-conid');
            let _this = this;
            if (confirm('確認刪除文章[' + title + ']嗎?')) {
                $.ajax({
                    url: '../../back/controller/myarticledel.php?conid=' + conid,
                    type: "GET",
                    dataType: "json",
                    success: function (result) {
                        if (result.delsuccess) {
                            $(_this).parent().parent().remove();
                        } else if (result.nologin) {
                            alert(result.nologin)
                            $(window).attr('location', './login.php');
                        } else if (result.erroruser) {
                            alert(result.erroruser)
                        } else {
                            alert('刪除失敗')
                        }
                    }
                });
            }
        })




    <?php echo '</script'; ?>
>
</body>

</html><?php }
}
