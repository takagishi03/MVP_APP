<?php
/* Smarty version 4.3.4, created on 2023-11-08 11:29:59
  from '/Applications/MAMP/htdocs/mvc_app/Views/contact/edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_654b7137b6a2d6_94320279',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5fff580b287f0b0e99dc5cedd40967815a4c01ca' => 
    array (
      0 => '/Applications/MAMP/htdocs/mvc_app/Views/contact/edit.tpl',
      1 => 1699442997,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_654b7137b6a2d6_94320279 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>お問い合わせ内容更新画面</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>

    <div class="container p-4">
        <h1>お問い合わせ内容更新画面</h1>

        <form action="/contact/up-date" method="post" class="bg-white p-3 rounded mb-5" onsubmit="return validateForm()">
            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['contacts']->value->id;?>
">
            <input type="hidden" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
">

            <div class="form-group">
                <label for="name">氏名</label>
                <input type="text" class="form-control" name="name" placeholder="テスト太郎" value="<?php echo (($tmp = htmlspecialchars((string)$_smarty_tpl->tpl_vars['contacts']->value->name, ENT_QUOTES, 'UTF-8', true) ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                <p class="text-danger" id="nameError"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
            </div>

            <div class="form-group">
                <label for="kana">ふりがな</label>
                <input type="text" class="form-control" name="kana" placeholder="てすとたろう" value="<?php echo (($tmp = htmlspecialchars((string)$_smarty_tpl->tpl_vars['contacts']->value->kana, ENT_QUOTES, 'UTF-8', true) ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                <p class="text-danger" id="kanaError"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['kana'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
            </div>

            <div class="form-group">
                <label for="tel">電話番号</label>
                <input type="tel" class="form-control" name="tel" placeholder="06-6012-3456" value="<?php echo (($tmp = htmlspecialchars((string)$_smarty_tpl->tpl_vars['contacts']->value->tel, ENT_QUOTES, 'UTF-8', true) ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                <p class="text-danger" id="telError"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['tel'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
            </div>
            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="email" class="form-control" name="email" placeholder="exemple@cin-group.co.jp" value="<?php echo (($tmp = htmlspecialchars((string)$_smarty_tpl->tpl_vars['contacts']->value->email, ENT_QUOTES, 'UTF-8', true) ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                <p class="text-danger" id="emailError"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
            </div>

            <div class="form-group">
                <label for="body">問い合わせ内容</label>
                <textarea class="form-control" name="body" placeholder="お問い合わせ内容"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['contacts']->value->body, ENT_QUOTES, 'UTF-8', true);?>
</textarea>
                <p class="text-danger" id="bodyError"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['body'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
            </div>

            <button class="btn btn-warning my-2" type="submit">送信</button>
        </form>

        <p>上記の内容でよろしいでしょうか？</p>

        <form action="/contact/index" method="post">
            <input type="hidden" name="name" value="<?php echo $_smarty_tpl->tpl_vars['contacts']->value->name;?>
">
            <input type="hidden" name="kana" value="<?php echo $_smarty_tpl->tpl_vars['contacts']->value->kana;?>
">
            <input type="hidden" name="tel" value="<?php echo $_smarty_tpl->tpl_vars['contacts']->value->tel;?>
">
            <input type="hidden" name="email" value="<?php echo $_smarty_tpl->tpl_vars['contacts']->value->email;?>
">
            <input type="hidden" name="body" value="<?php echo $_smarty_tpl->tpl_vars['contacts']->value->body;?>
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

            var valid = true;

            if (name === "") {
                document.getElementById("nameError").innerHTML = "氏名を入力してください。";
                valid = false;
            } else {
                document.getElementById("nameError").innerHTML = "";
            }

            if (kana === "") {
                document.getElementById("kanaError").innerHTML = "ふりがなを入力してください。";
                valid = false;
            } else {
                document.getElementById("kanaError").innerHTML = "";
            }

            if (email === "") {
                document.getElementById("emailError").innerHTML = "メールアドレスを入力してください。";
                valid = false;
            } else {
                document.getElementById("emailError").innerHTML = "";
            }

            if (tel.length > 11) {
                document.getElementById("telError").innerHTML = "電話番号は11桁以下で入力してください。";
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
