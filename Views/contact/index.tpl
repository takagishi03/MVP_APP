<!doctype html>
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
                        <input type="text" class="form-control" name="name" placeholder="テスト太郎" value="{$post['name']|default:''}">
                        <p class="error-text" id="nameError">{$errorMessages['name']|default:''}</p>
                    </div>

                    <div class="form-group">
                        <label for="kana">ふりがな</label>
                        <input type="text" class="form-control" name="kana" placeholder="てすとたろう" value="{$post['kana']|default:''}">
                        <p class="error-text" id="kanaError">{$errorMessages['kana']|default:''}</p>
                    </div>

                    <div class="form-group">
                        <label for="tel">電話番号</label>
                        <input type="tel" class="form-control" name="tel" placeholder="06-6012-3456" value="{$post['tel']|default:''}">
                        <p class="error-text" id="telError">{$errorMessages['tel']|default:''}</p>
                    </div>
                    <div class="form-group">
                        <label for="email">メールアドレス</label>
                        <input type="email" class="form-control" name="email" placeholder="exemple@cin-group.co.jp" value="{$post['email']|default:''}">
                        <p class="error-text" id="emailError">{$errorMessages['email']|default:''}</p>
                    </div>
                    <div class="form-group">
                        <label for="body">問い合わせ内容</label>
                        <input type="text" class="form-control" name="body" placeholder="お問い合わせ内容" value="{$post['body']|default:''}">
                        <p class="error-text" id="bodyError">{$errorMessages['body']|default:''}</p>
                    </div>
                    <button class="btn bg-warning my-2" type="submit">送信</button>
                </form>
            </div>
        </div>
        <table class="table table-striped-columns">
            <tr>
                <th>Name</th>
                <th>Kana</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>Body</th>
                <th>ID</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            {foreach from=$contacts item=contact}
            <tr>
                <td>{$contact->name}</td>
                <td>{$contact->kana}</td>
                <td>{$contact->tel}</td>
                <td>{$contact->email}</td>
                <td>{$contact->body}</td>
                <td>{$contact->id}</td>
                <td><button>Edit</button></td>
                <td><button>Delete</button></td>
            </tr>
            {/foreach}


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



    <script>
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
    </script>
</body>

</html>