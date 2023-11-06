<?php
/* Smarty version 4.3.4, created on 2023-11-06 14:43:38
  from '/Applications/MAMP/htdocs/mvc_app/Views/contact/confirmation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6548fb9a2f1b56_06220900',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e922cbbdf1fd4e35380fc1e61d2cc165491caa9' => 
    array (
      0 => '/Applications/MAMP/htdocs/mvc_app/Views/contact/confirmation.tpl',
      1 => 1699281812,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6548fb9a2f1b56_06220900 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>お問い合わせ確認</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">お問い合わせ内容の確認</h2>

        <div class="alert alert-info">
            <strong>氏名:</strong>
            <p><?php echo $_smarty_tpl->tpl_vars['post']->value['name'];?>
</p>
        </div>
        <div class="alert alert-info">
            <strong>ふりがな:</strong>
            <p><?php echo $_smarty_tpl->tpl_vars['post']->value['kana'];?>
</p>
        </div>
        <div class="alert alert-info">
            <strong>電話番号:</strong>
            <p><?php echo $_smarty_tpl->tpl_vars['post']->value['tel'];?>
</p>
        </div>
        <div class="alert alert-info">
            <strong>メールアドレス:</strong>
            <p><?php echo $_smarty_tpl->tpl_vars['post']->value['email'];?>
</p>
        </div>
        <div class="alert alert-info">
            <strong>問い合わせ内容:</strong>
            <p><?php echo $_smarty_tpl->tpl_vars['post']->value['body'];?>
</p>
        </div>

        <p>上記の内容でよろしいでしょうか？</p>

        <form action="/contact/create" method="post">
            <input type="hidden" name="name" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['name'];?>
">
            <input type="hidden" name="kana" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['kana'];?>
">
            <input type="hidden" name="tel" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['tel'];?>
">
            <input type="hidden" name="email" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['email'];?>
">
            <input type="hidden" name="body" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['body'];?>
">
            <button type="submit" class="btn btn-success mt-3">送信</button>
        </form>

        <form action="/contact/index" method="post">
            <input type="hidden" name="name" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['name'];?>
">
            <input type="hidden" name="kana" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['kana'];?>
">
            <input type="hidden" name="tel" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['tel'];?>
">
            <input type="hidden" name="email" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['email'];?>
">
            <input type="hidden" name="body" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['body'];?>
">
            <button type="submit" class="btn btn-danger mt-3">キャンセル</button>
        </form>
    </div>

    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.slim.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"><?php echo '</script'; ?>
>
</body>


</html><?php }
}
