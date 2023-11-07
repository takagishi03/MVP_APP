<?php
/* Smarty version 4.3.4, created on 2023-11-07 12:52:19
  from '/Applications/MAMP/htdocs/mvc_app/Views/contact/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_654a33038c6dd3_87894821',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c57b4f7d76450b6666497f89adb5183a6385d349' => 
    array (
      0 => '/Applications/MAMP/htdocs/mvc_app/Views/contact/index.tpl',
      1 => 1699361537,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_654a33038c6dd3_87894821 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>お問い合わせ入力画面</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <div class="p-4 container-field form-orange">
        <div class="row justify-content-center">
            <div class="col-lg-6 mx-auto col-md-8">
                <h2 class="mb-4">お問い合わせ</h2>

                <form action="/contact/edit-confirmation" method="post" class="bg-white p-3 rounded mb-5" onsubmit="return validateForm()">

                    <div class="form-group">
                        <label for="name">氏名</label>
                        <input type="text" class="form-control" name="name" placeholder="テスト太郎" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['post']->value['name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                        <p class="error-text" id="nameError"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                    </div>

                    <div class="form-group">
                        <label for="kana">ふりがな</label>
                        <input type="text" class="form-control" name="kana" placeholder="てすとたろう" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['post']->value['kana'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                        <p class="error-text" id="kanaError"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['kana'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                    </div>

                    <div class="form-group">
                        <label for="tel">電話番号</label>
                        <input type="tel" class="form-control" name="tel" placeholder="06-6012-3456" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['post']->value['tel'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                        <p class="error-text" id="telError"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['tel'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                    </div>
                    <div class="form-group">
                        <label for="email">メールアドレス</label>
                        <input type="email" class="form-control" name="email" placeholder="exemple@cin-group.co.jp" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['post']->value['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                        <p class="error-text" id="emailError"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                    </div>
                    <div class="form-group">
                        <label for="body">問い合わせ内容</label>
                        <textarea class="form-control" name="body" placeholder="お問い合わせ内容"><?php echo (($tmp = $_smarty_tpl->tpl_vars['post']->value['body'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</textarea>
                        <p class="error-text" id="bodyError"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['body'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                    </div>

                    <button class="btn bg-warning my-2" type="submit">送信</button>
                </form>
            </div>
        </div>
        <table class="table table-striped-columns">
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
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['contacts']->value, 'contact');
$_smarty_tpl->tpl_vars['contact']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
$_smarty_tpl->tpl_vars['contact']->do_else = false;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['contact']->value->id;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['contact']->value->name;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['contact']->value->kana;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['contact']->value->tel;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['contact']->value->email;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['contact']->value->body;?>
</td>
                <td>
                    <a href="/contact/edit?id=<?php echo $_smarty_tpl->tpl_vars['contact']->value->id;?>
" class="button mt-4">編集</a>
                </td>
                <td>
                    <a href="/contact/delete?id=<?php echo $_smarty_tpl->tpl_vars['contact']->value->id;?>
" class="button mt-4" onclick="return confirm('本当に削除しますか?')">削除</a>
                </td>
            </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


        </table>
        <div>
            <div class="row justify-content-md-center text-center">
                <div class="col-lg-6 mx-auto col-md-8">
                    <div class="bg-white p-3 rounded mb-5">
                        <div class="m-1">
                        </div>
                        <div class="m-1">
                            <p><a href="/">トップページへ</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



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
