<?php
/* Smarty version 4.3.4, created on 2023-11-08 11:25:42
  from '/Applications/MAMP/htdocs/mvc_app/Views/contact/confirmation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_654b7036e10f74_99588996',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e922cbbdf1fd4e35380fc1e61d2cc165491caa9' => 
    array (
      0 => '/Applications/MAMP/htdocs/mvc_app/Views/contact/confirmation.tpl',
      1 => 1699442509,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_654b7036e10f74_99588996 (Smarty_Internal_Template $_smarty_tpl) {
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
            <p><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['post']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</p>
        </div>
        <div class="alert alert-info">
            <strong>ふりがな:</strong>
            <p><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['post']->value['kana'], ENT_QUOTES, 'UTF-8', true);?>
</p>
        </div>
        <div class="alert alert-info">
            <strong>電話番号:</strong>
            <p><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['post']->value['tel'], ENT_QUOTES, 'UTF-8', true);?>
</p>
        </div>
        <div class="alert alert-info">
            <strong>メールアドレス:</strong>
            <p><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['post']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
</p>
        </div>
        <div class="alert alert-info">
            <strong>問い合わせ内容:</strong>
            <p><?php echo nl2br((string) htmlspecialchars((string)$_smarty_tpl->tpl_vars['post']->value['body'], ENT_QUOTES, 'UTF-8', true), (bool) 1);?>
</p>
        </div>

        <p>上記の内容でよろしいでしょうか？</p>

        <form action="/contact/create" method="post">
        <input type="hidden" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
">
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
    <?php echo '<script'; ?>
>
        function validateForm() {
            var name = document.forms[0]["name"].value;
            var kana = document.forms[0]["kana"].value;
            var tel = document.forms[0]["tel"].value;
            var email = document.forms[0]["email"].value;
            var body = document.forms[0]["body"].value;

            var valid = true; // フロントバリデーションのフラグ

            if (name === "") {
                document.getElementById("nameError").innerHTML = "氏名を入力してください.";
                valid = false;
            } else {
                document.getElementById("nameError").innerHTML = "";
            }

            if (kana === "") {
                document.getElementById("kanaError").innerHTML = "ふりがなを入力してください.";
                valid = false;
            } else {
                document.getElementById("kanaError").innerHTML = "";
            }

            if (email === "") {
                document.getElementById("emailError").innerHTML = "メールアドレスを入力してください.";
                valid = false;
            } else {
                document.getElementById("emailError").innerHTML = "";
            }

            if (tel.length > 11) {
                document.getElementById("telError").innerHTML = "電話番号は11桁以下で入力してください.";
                valid = false;
            } else {
                document.getElementById("telError").innerHTML = "";
            }

            return valid;
        }
    <?php echo '</script'; ?>
>
</body>


</html><?php }
}
