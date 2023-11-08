<!doctype html>
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
                        <input type="text" class="form-control" name="name" placeholder="テスト太郎" value="{$post['name']|default:''}">
                        <p class="text-danger" id="nameError">{$errorMessages['name']|default:''}</p>
                    </div>

                    <div class="form-group">
                        <label for="kana">ふりがな</label>
                        <input type="text" class="form-control" name="kana" placeholder="てすとたろう" value="{$post['kana']|default:''}">
                        <p class="text-danger" id="kanaError">{$errorMessages['kana']|default:''}</p>
                    </div>

                    <div class="form-group">
                        <label for="tel">電話番号</label>
                        <input type="tel" class="form-control" name="tel" placeholder="06-6012-3456" value="{$post['tel']|default:''}">
                        <p class="text-danger" id="telError">{$errorMessages['tel']|default:''}</p>
                    </div>
                    <div class="form-group">
                        <label for="email">メールアドレス</label>
                        <input type="email" class="form-control" name="email" placeholder="exemple@cin-group.co.jp" value="{$post['email']|default:''}">
                        <p class="text-danger" id="emailError">{$errorMessages['email']|default:''}</p>
                    </div>
                    <div class="form-group">
                        <label for="body">問い合わせ内容</label>
                        <textarea class="form-control" name="body" placeholder="お問い合わせ内容">{$post['body']|default:''}</textarea>
                        <p class="text-danger" id="bodyError">{$errorMessages['body']|default:''}</p>
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
                {foreach from=$contacts item=contact}
                <tr>
                    <td>{$contact->id|escape|nl2br}</td>
                    <td>{$contact->name|escape|nl2br}</td>
                    <td>{$contact->kana|escape|nl2br}</td>
                    <td>{$contact->tel|escape|nl2br}</td>
                    <td>{$contact->email|escape|nl2br}</td>
                    <td>{$contact->body|escape|nl2br}</td>
                    <td>
                        <a href="/contact/edit?id={$contact->id}" class="btn btn-primary mt-4">編集</a>
                    </td>
                    <td>
                        <a href="/contact/delete?id={$contact->id}" class="btn btn-danger mt-4" onclick="return confirm('本当に削除しますか?')">削除</a>
                    </td>
                </tr>
                {/foreach}
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
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
    </script>
</body>

</html>