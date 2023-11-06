<?php
require_once ROOT_PATH . 'Controllers/Controller.php';
require_once ROOT_PATH . 'Models/Contact.php';

class ContactController extends Controller
{

    // 入力画面
    public function index()
    {
        $errorMessages = $_SESSION['errorMessages'] ?? [];
        $post = $_SESSION['post'] ?? [];
        $_SESSION['errorMessages'] = [];
        $_SESSION['post'] = [];
        $this->view('contact/index', ['errorMessages' => $errorMessages, 'post' => $post]);
    }

    // 確認画面
    public function confirmation()
    {
        $errorMessages = [];

        // バリデーションを行う
        if (empty($_POST['name'])) {
            $errorMessages['name'] = '氏名を入力してください。';
        }
        if (empty($_POST['kana'])) {
            $errorMessages['kana'] = 'ふりがなを入力してください。';
        }
        if (empty($_POST['email'])) {
            $errorMessages['email'] = 'メールアドレスを入力してください。';
        }
        if (!empty($_POST['tel']) && strlen($_POST['tel']) > 11) {
            $errorMessages['tel'] = '電話番号は11桁以下で入力してください.';
        }

        if (!empty($errorMessages)) {
            // バリデーション失敗
            $_SESSION['errorMessages'] = $errorMessages;
            $_SESSION['post'] = $_POST; // フォームデータをセッションに保存
            header('Location: /contact/index');
        } else {
            // バリデーションに成功した場合、お問い合わせ内容を表示
            $_SESSION['post'] = $_POST; // フォームデータをセッションに保存
            $this->view('contact/confirmation', ['post' => $_POST]);
        }
    }



    // ユーザー登録
    public function create()
    {

        $errorMessages = [];

        if (empty($_POST['name'])) {
            $errorMessages['name'] = '氏名を入力してください。';
            echo "氏名を入力してください。";
        }
        if (empty($_POST['kana'])) {
            $errorMessages['kana'] = 'ふりがなを入力してください。';
        }
        if (empty($_POST['email'])) {
            $errorMessages['email'] = 'メールアドレスを入力してください。';
        }
        if (!empty($_POST['tel']) && strlen($_POST['tel']) > 11) {
            $errorMessages['tel'] = '電話番号は11桁以下で入力してください。';
        }
        if (!empty($errorMessages)) {
            // バリデーション失敗
            $_SESSION['errorMessages'] = $errorMessages;
            $_SESSION['post'] = $_POST;
            header('Location: /contact/index');
        } else {
            // 登録処理
            $contact = new contact;
            $result = $contact->create(
                $_POST['name'],
                $_POST['kana'],
                $_POST['tel'],
                $_POST['email'],
                $_POST['body']
            );

            if (is_numeric($result)) {
                $this->view('contact/send-complete');
            } else {
                $errorMessages['email'] = 'メールアドレスが既に使用されています.';
                $_SESSION['errorMessages'] = $errorMessages;
                $_SESSION['post'] = $_POST;
                header('Location: /contact/index');
            }
        }
    }
}
