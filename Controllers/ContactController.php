<?php
require_once ROOT_PATH . 'Controllers/Controller.php';
require_once ROOT_PATH . 'Models/Contact.php';

class ContactController extends Controller
{
    // 入力画面
    public function index()
    {
        $contact = new contact;
        $errorMessages = $_SESSION['errorMessages'] ?? [];
        $post = $_SESSION['post'] ?? [];
        $_SESSION['errorMessages'] = [];
        $_SESSION['post'] = [];
        $contacts = $contact->getAllContacts();

        $this->view('contact/index', ['errorMessages' => $errorMessages, 'post' => $post, 'contacts' => $contacts]);
    }

    // 確認画面
    public function confirmation()
    {
        // CSRFトークンを生成し、セッションに保存
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        // CSRFトークンをテンプレートに渡す
        $csrf_token = $_SESSION['csrf_token'];

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
            $this->view('contact/confirmation', ['post' => $_POST, 'csrf_token' => $csrf_token]);
        }
    }

    // 問い合わせ登録
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
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
                $errorMessages['tel'] = '電話番号は11桁以下で入力してください.';
            }
            if (!empty($_POST['tel']) && !ctype_digit($_POST['tel'])) {
                $errorMessages['tel'] = '電話番号は半角数字で入力してください。';
            }
            if (!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errorMessages['email'] = '有効なメールアドレスを入力してください。';
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
                    unset($_SESSION['post']);
                    $this->view('contact/send-complete');
                } else {
                    $_SESSION['errorMessages'] = $errorMessages;
                    $_SESSION['post'] = $_POST;
                    header("Location: /contact/index");
                }
            }
        } else {
            // CSRF攻撃を検出した場合の処理
            echo "CSRF攻撃を検出しました。";
        }
    }


    //  編集
    public function edit()
    {
        // CSRFトークンを生成し、セッションに保存
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        // CSRFトークンをテンプレートに渡す
        $csrf_token = $_SESSION['csrf_token'];

        $id = $_GET['id'];
        $contact = new contact;
        $contacts = $contact->getContact($id);
        $errorMessages = $_SESSION['errorMessages'] ?? [];
        $post = $_SESSION['post'] ?? [];
        $_SESSION['errorMessages'] = [];
        $_SESSION['post'] = [];

        $this->view('contact/edit', ['errorMessages' => $errorMessages, 'post' => $post, 'contacts' => $contacts, 'csrf_token' => $csrf_token]);
    }

    // 更新
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
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
                $errorMessages['tel'] = '電話番号は11桁以下で入力してください.';
            }
            if (!empty($_POST['tel']) && !ctype_digit($_POST['tel'])) {
                $errorMessages['tel'] = '電話番号は半角数字で入力してください。';
            }
            if (!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errorMessages['email'] = '有効なメールアドレスを入力してください。';
            }

            if (!empty($errorMessages)) {
                // バリデーション失敗
                $_SESSION['errorMessages'] = $errorMessages;
                $_SESSION['post'] = $_POST;
                header('Location: /contact/edit');
            } else {
                // 登録処理
                $contact = new contact;
                $result = $contact->updateContact(
                    $_POST['id'],
                    $_POST['name'],
                    $_POST['kana'],
                    $_POST['tel'],
                    $_POST['email'],
                    $_POST['body']
                );

                if (is_numeric($result)) {
                    unset($_SESSION['post']);
                    header("Location: /contact/index");
                    exit();
                } else {
                    $_SESSION['errorMessages'] = $errorMessages;
                    header("Location: /contact/index");
                    exit();
                }
            }
        } else {
            // CSRF攻撃を検出した場合の処理
            echo "CSRF攻撃を検出しました。";
        }
    }

    // デリート
    public function delete()
    {
        $id = $_GET['id'];
        // 確認用
        // if (isset($id)) {
        //     echo "\$id が格納されています。値は: $id です。";
        // } else {
        //     echo "\$id は格納されていません。";
        // }
        $contact = new contact;
        $contact->deleteContact($id);
        header("Location: /contact/index");
        exit();
    }
}
