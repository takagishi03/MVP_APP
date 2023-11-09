<?php
/* Smarty version 4.3.4, created on 2023-11-09 09:44:06
  from '/Applications/MAMP/htdocs/mvc_app/Views/contact/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_654ca9e6835382_38437043',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c57b4f7d76450b6666497f89adb5183a6385d349' => 
    array (
      0 => '/Applications/MAMP/htdocs/mvc_app/Views/contact/index.tpl',
      1 => 1699523021,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_654ca9e6835382_38437043 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>お問い合わせ入力画面</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <div class="container p-4">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <h2 class="mb-4">お問い合わせ</h2>

                <form action="/contact/edit-confirmation" method="post" class="bg-white p-3 rounded mb-5" onsubmit="return validateForm()">
                    <div class="form-group">
                        <label for="name">氏名</label>
                        <input type="text" class="form-control" name="name" placeholder="テスト太郎" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['post']->value['name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                        <p class="text-danger" id="nameError"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                    </div>

                    <div class="form-group">
                        <label for="kana">ふりがな</label>
                        <input type="text" class="form-control" name="kana" placeholder="てすとたろう" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['post']->value['kana'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                        <p class="text-danger" id="kanaError"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['kana'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                    </div>

                    <div class="form-group">
                        <label for="tel">電話番号</label>
                        <input type="tel" class="form-control" maxlength="11" name="tel" placeholder="04012349876" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['post']->value['tel'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                        <p class="text-danger" id="telError"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['tel'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                    </div>
                    <div class="form-group">
                        <label for="email">メールアドレス</label>
                        <input type="email" class="form-control" name="email" placeholder="exemple@cin-group.co.jp" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['post']->value['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                        <p class="text-danger" id="emailError"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                    </div>
                    <div class="form-group">
                        <label for="body">問い合わせ内容</label>
                        <textarea class="form-control" name="body" placeholder="お問い合わせ内容"><?php echo (($tmp = $_smarty_tpl->tpl_vars['post']->value['body'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</textarea>
                        <p class="text-danger" id="bodyError"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['body'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                    </div>

                    <button class="btn btn-warning my-2" type="submit">送信</button>
                </form>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Kana</th>
                    <th>Telephone</th>
                    <th>Email</th>
                    <th>Body</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['contacts']->value, 'contact');
$_smarty_tpl->tpl_vars['contact']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
$_smarty_tpl->tpl_vars['contact']->do_else = false;
?>
                <tr>
                    <td><?php echo nl2br((string) htmlspecialchars((string)$_smarty_tpl->tpl_vars['contact']->value->id, ENT_QUOTES, 'UTF-8', true), (bool) 1);?>
</td>
                    <td><?php echo nl2br((string) htmlspecialchars((string)$_smarty_tpl->tpl_vars['contact']->value->name, ENT_QUOTES, 'UTF-8', true), (bool) 1);?>
</td>
                    <td><?php echo nl2br((string) htmlspecialchars((string)$_smarty_tpl->tpl_vars['contact']->value->kana, ENT_QUOTES, 'UTF-8', true), (bool) 1);?>
</td>
                    <td><?php echo nl2br((string) htmlspecialchars((string)$_smarty_tpl->tpl_vars['contact']->value->tel, ENT_QUOTES, 'UTF-8', true), (bool) 1);?>
</td>
                    <td><?php echo nl2br((string) htmlspecialchars((string)$_smarty_tpl->tpl_vars['contact']->value->email, ENT_QUOTES, 'UTF-8', true), (bool) 1);?>
</td>
                    <td><?php echo nl2br((string) htmlspecialchars((string)$_smarty_tpl->tpl_vars['contact']->value->body, ENT_QUOTES, 'UTF-8', true), (bool) 1);?>
</td>
                    <td>
                        <a href="/contact/edit?id=<?php echo $_smarty_tpl->tpl_vars['contact']->value->id;?>
" class="btn btn-primary mt-4">編集</a>
                    </td>
                    <td>
                        <a href="/contact/delete?id=<?php echo $_smarty_tpl->tpl_vars['contact']->value->id;?>
" class="btn btn-danger mt-4" onclick="return confirm('本当に削除しますか?')">削除</a>
                    </td>
                </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
        <div class="row justify-content-md-center text-center">
            <div class="col-lg-6 col-md-8">
                <div class="bg-white p-3 rounded mb-5">
                    <div class="m-1">
                        <p><a href="/">トップページへ</a></p>
                    </div>
                </div>
            </div>
        </div>
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
                document.getElementById("nameError").innerHTML = "氏名を入力してください.";
                valid = false;
            } else if (name.length > 10) {
                document.getElementById("nameError").innerHTML = "氏名は10文字以内で入力してください.";
                valid = false;
            } else {
                document.getElementById("nameError").innerHTML = "";
            }

            if (kana === "") {
                document.getElementById("kanaError").innerHTML = "ふりがなを入力してください.";
                valid = false;
            } else if (kana.length > 10) {
                document.getElementById("kanaError").innerHTML = "ふりがなは10文字以内で入力してください.";
                valid = false;
            } else {
                document.getElementById("kanaError").innerHTML = "";
            }

            if (email === "") {
                document.getElementById("emailError").innerHTML = "メールアドレスを入力してください.";
                valid = false;
            } else if (!validateEmail(email)) {
                document.getElementById("emailError").innerHTML = "有効なメールアドレスを入力してください.";
                valid = false;
            } else {
                document.getElementById("emailError").innerHTML = "";
            }

            if (tel.match(/[0-9]+/g) != tel ) {
                document.getElementById("telError").innerHTML = "半角英数字のみで入力してください.";
            } else {
                document.getElementById("telError").innerHTML = "";
            }

            if (body === "") {
                document.getElementById("bodyError").innerHTML = "お問い合わせ内容を入力してください.";
                valid = false;
            } else {
                document.getElementById("bodyError").innerHTML = "";
            }

            return valid;
        }

        function validateEmail(email) {
            // メールアドレスの正規表現
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
    <?php echo '</script'; ?>
>
</body>

</html><?php }
}
