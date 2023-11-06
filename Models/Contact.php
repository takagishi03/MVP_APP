<?php
require_once(ROOT_PATH . 'Models/Db.php');

class Contact extends Db
{

    public function __construct($dbh = null)
    {
        parent::__construct($dbh);
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * @param string $name 氏名
     * @param string $kana ふりがな
     * @param string $tel 電話番号
     * @param string $email メールアドレス
     * @param string $body お問い合わせ内容
     */
    public function create(string $name, string $kana, string $tel, string $email, string $body)
    {
        try {
            $this->dbh->beginTransaction();
            $query = 'INSERT INTO contacts (name, kana, tel, email, body) VALUES (:name, :kana, :tel, :email, :body)';

            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':kana', $kana, PDO::PARAM_STR);
            $stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':body', $body, PDO::PARAM_STR);
            $stmt->execute();

            $lastId = $this->dbh->lastInsertId();

            // トランザクションを完了することでデータの書き込みを確定させる
            $this->dbh->commit();

            return $lastId;
        } catch (PDOException $e) {
            // 不具合があった場合トランザクションをロールバックして変更をなかったことにする。
            $this->dbh->rollBack();
            echo "登録失敗: " . $e->getMessage() . "\n";
            exit();
        }
    }
}
