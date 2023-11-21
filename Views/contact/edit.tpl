<!DOCTYPE html>
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
            <input type="hidden" name="id" value="{$contacts->id}">
            <input type="hidden" name="csrf_token" value="{$csrf_token}">

            <div class="form-group">
                <label for="name">氏名</label>
                <input type="text" class="form-control" name="name" placeholder="テスト太郎" value="{$contacts->name|escape|default:''}">
                <p class="text-danger" id="nameError">{$errorMessages['name']|default:''}</p>
            </div>

            <div class="form-group">
                <label for="kana">ふりがな</label>
                <input type="text" class="form-control" name="kana" placeholder="てすとたろう" value="{$contacts->kana|escape|default:''}">
                <p class="text-danger" id="kanaError">{$errorMessages['kana']|default:''}</p>
            </div>

            <div class="form-group">
                <label for="tel">電話番号</label>
                <input type="tel" class="form-control" name="tel" placeholder="06-6012-3456" value="{$contacts->tel|escape|default:''}">
                <p class="text-danger" id="telError">{$errorMessages['tel']|default:''}</p>
            </div>
            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="email" class="form-control" name="email" placeholder="exemple@cin-group.co.jp" value="{$contacts->email|escape|default:''}">
                <p class="text-danger" id="emailError">{$errorMessages['email']|default:''}</p>
            </div>

            <div class="form-group">
                <label for="body">問い合わせ内容</label>
                <textarea class="form-control" name="body" placeholder="お問い合わせ内容">{$contacts->body|escape}</textarea>
                <p class="text-danger" id="bodyError">{$errorMessages['body']|default:''}</p>
            </div>

            <button class="btn btn-warning my-2" type="submit">送信</button>
        </form>

        <p>上記の内容でよろしいでしょうか？</p>

        <form action="/contact/index" method="post">
            <input type="hidden" name="name" value="{$contacts->name}">
            <input type="hidden" name="kana" value="{$contacts->kana}">
            <input type="hidden" name="tel" value="{$contacts->tel}">
            <input type="hidden" name="email" value="{$contacts->email}">
            <input type="hidden" name="body" value="{$contacts->body}">
            <button type="submit" class="btn btn-danger mt-3">キャンセル</button>
        </form>
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
    </script>
</body>

</html>