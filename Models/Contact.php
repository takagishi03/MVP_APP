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

    /**
     * 表示用の問い合わせ内容を全件取得して返却する
     * @param int $id 問い合わせID
     * @param string $name 氏名
     * @param string $kana ふりがな
     * @param string $tel 電話番号
     * @param string $email メールアドレス
     * @param string $body お問い合わせ内容
     */
    public function getAllContacts(): array
    {
        try {
            $query = 'SELECT * FROM contacts';
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "データベースエラー: " . $e->getMessage() . "\n";
            exit();
        }
    }

    /**
     * ユーザーIDに対応するユーザーのデータをテーブルから削除する
     * @param string $id 問い合わせID
     * @return void
     */
    public function deleteContact(string $id)
    {
        try {
            $this->dbh->beginTransaction();
            $query = 'DELETE FROM contacts WHERE id = :id';
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            echo "deleteContact";
            // トランザクションを完了することでデータの書き込みを確定させる
            $this->dbh->commit();
            return;

        } catch (PDOException $e) {
            // 不具合があった場合トランザクションをロールバックして変更をなかったコトにする。
            $this->dbh->rollBack();
            echo "削除失敗: " . $e->getMessage() . "\n";
            exit();
        }
    }
}
