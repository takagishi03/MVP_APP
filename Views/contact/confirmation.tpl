<!DOCTYPE html>
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
            <p>{$post['name']|escape}</p>
        </div>
        <div class="alert alert-info">
            <strong>ふりがな:</strong>
            <p>{$post['kana']|escape}</p>
        </div>
        <div class="alert alert-info">
            <strong>電話番号:</strong>
            <p>{$post['tel']|escape}</p>
        </div>
        <div class="alert alert-info">
            <strong>メールアドレス:</strong>
            <p>{$post['email']|escape}</p>
        </div>
        <div class="alert alert-info">
            <strong>問い合わせ内容:</strong>
            <p>{$post['body']|escape|nl2br}</p>
        </div>

        <p>上記の内容でよろしいでしょうか？</p>

        <form action="/contact/create" method="post">
        <input type="hidden" name="csrf_token" value="{$csrf_token}">
            <input type="hidden" name="name" value="{$post['name']}">
            <input type="hidden" name="kana" value="{$post['kana']}">
            <input type="hidden" name="tel" value="{$post['tel']}">
            <input type="hidden" name="email" value="{$post['email']}">
            <input type="hidden" name="body" value="{$post['body']}">
            <button type="submit" class="btn btn-success mt-3">送信</button>
        </form>

        <form action="/contact/index" method="post">
            <input type="hidden" name="name" value="{$post['name']}">
            <input type="hidden" name="kana" value="{$post['kana']}">
            <input type="hidden" name="tel" value="{$post['tel']}">
            <input type="hidden" name="email" value="{$post['email']}">
            <input type="hidden" name="body" value="{$post['body']}">
            <button type="submit" class="btn btn-danger mt-3">キャンセル</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>


</html>