<?php
/* Smarty version 3.1.33, created on 2019-07-29 17:31:55
  from 'C:\xampp\htdocs\MessageBook\back\smarty\smarty\temp\message\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d3ebd0be614d2_96711521',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '81fec10df4cf1afc1b48d77271b9b4306526fb00' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MessageBook\\back\\smarty\\smarty\\temp\\message\\index.html',
      1 => 1564392694,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:\\xampp\\htdocs\\MessageBook\\back\\public\\header.html' => 1,
  ),
),false)) {
function content_5d3ebd0be614d2_96711521 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:\xampp\htdocs\MessageBook\back\public\header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'留言版首頁'), 0, false);
?>
<header>
    <style>
        #messagetable {
            padding: 30px;
            font-size: 20px;
        }

        #page {
            height: 10%;
            width: 30%;
            position: relative;
            top: -20%;
            left: 0%;
        }

        #showtitle {
            width: 90%;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
        }

        td {
            width: 33%;
        }
    </style>
</header>
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <div class="form-group">
                    <div class="col-md-12">
                        <form action="./" method = 'get'>
                            <p><input name="search" type="text" spellcheck ="false" 
                                placeholder="依文章或姓名查詢" class="form-control input-md" value="<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
"></p>
                            <p><button id="searchbun" type="submit" class="btn btn-info btn-block">search</button></p>
                        </form>               
                    </div>
                </div>
            </div>
            <div class="col-sm-8 text-left">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>標題</th>
                            <th>發佈者</th>
                            <th>發佈時間</th>
                        </tr>
                    </thead>
                    <tbody id='buildindex'>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['contentdata']->value, 'coninfo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['coninfo']->value) {
?>
                        <tr>
                            <td ><a href="../controller/content.php?conid=<?php echo $_smarty_tpl->tpl_vars['coninfo']->value['conid'];?>
">
                                <span id='showtitle'><?php echo $_smarty_tpl->tpl_vars['coninfo']->value['title'];?>
</span></a></td>
                            <td><?php echo $_smarty_tpl->tpl_vars['coninfo']->value['userName'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['coninfo']->value['createtime'];?>
</td>
                        </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-2 sidenav">
                <div class="well">
                    <p>1.站內禁止任何交易行為</p>
                    <p>2.禁止人身攻擊的文字</p>
                </div>
            </div>
            <div class="container" id='page'>
                <ul class="pagination">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['showpage']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
                        <?php if ($_smarty_tpl->tpl_vars['pagenum']->value !== $_smarty_tpl->tpl_vars['v']->value) {?>
                            <li><a href="../controller/index.php?page=<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
&search=<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</a></li>
                        <?php } else { ?>
                            <li class="active"><a href="../controller/index.php?page=<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
&search=<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</a></li>
                        <?php }?>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </ul>
            </div>
        </div>
    </div>
    <?php echo '<script'; ?>
>
    <?php echo '</script'; ?>
>
</body>

</html><?php }
}
