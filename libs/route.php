<?php
function route($path, $httpMethod)
{
    try {
        list($controller, $method) = explode('/', $path);
        $case = [$method, $httpMethod];
        switch ($controller) {
                // ホーム画面
            case 'home':
                $controllerName = 'HomeController';
                switch ($case) {
                    case ['index', 'get']:
                        $methodName = 'index';
                        break;
                    default:
                        $controllerName = '';
                        $methodName = '';
                }
                break;

                // ユーザー情報系
            case 'user':
                $controllerName = 'UserController';
                switch ($case) {
                    case ['log-in', 'get']:
                        $methodName = 'logIn';
                        break;

                    case ['log-out', 'get']:
                        $methodName = 'logOut';
                        break;

                    case ['sign-up', 'get']:
                        $methodName = 'signUp';
                        break;

                    case ['my-page', 'get']:
                        $methodName = 'myPage';
                        break;

                    case ['edit', 'get']:
                        $methodName = 'edit';
                        break;

                    case ['update', 'post']:
                        $methodName = 'update';
                        break;

                    case ['certification', 'post']:
                        $methodName = 'certification';
                        break;

                    case ['create', 'post']:
                        $methodName = 'create';
                        break;

                    case ['delete', 'get']:
                        $methodName = 'delete';
                        break;
                }
                break;

                // 問い合わせ
            case 'contact':
                $controllerName = 'ContactController';
                switch ($case) {
                        // 登録画面
                    case ['index', 'get']:
                        $methodName = 'index';
                        break;

                        // キャンセル時画面
                    case ['index', 'post']:
                        $methodName = 'index';
                        break;
                        // 登録内容確認
                    case ['edit-confirmation', 'post']:
                        $methodName = 'confirmation';
                        break;

                        // 登録
                    case ['create', 'post']:
                        $methodName = 'create';
                        break;
                }
                break;

            default:
                $controllerName = '';
                $methodName = '';
        }
        require_once(ROOT_PATH . "Controllers/{$controllerName}.php");

        $obj = new $controllerName();
        $obj->$methodName();
    } catch (Throwable $e) {
        error_log($e->getMessage());
        header("HTTP/1.0 404 Not Found");
    }
}
