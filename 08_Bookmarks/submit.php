<?php
// config.phpの読み込み
require_once('config.php');

// 1. POSTデータの取得
$book_name = $_POST['book_name'];
$book_url = $_POST['book_url'];
$book_comment = $_POST['book_comment'];

// 2. DB接続します
try {
    // データベースへの接続
    $pdo = new PDO("mysql:dbname=$dbname;charset=utf8;host=$host", $username, $password);

    // エラーモードを例外モードに設定
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 3. データ登録SQL作成    
    $stmt = $pdo->prepare("INSERT INTO gs_bm_table (name, url, comment, indate) VALUES (:name, :url, :comment, sysdate())");
    $stmt->bindParam(':name', $book_name, PDO::PARAM_STR);
    $stmt->bindParam(':url', $book_url, PDO::PARAM_STR);
    $stmt->bindParam(':comment', $book_comment, PDO::PARAM_STR);
    $status = $stmt->execute();

    // 4. データ登録処理後
    if ($status == false) {
        // エラー処理
        $error = $stmt->errorInfo();
        exit("QueryError:" . $error[2]);
    } else {
        // 登録ページへリダイレクト
        header("Location: index.php");
        exit;
    }


} catch (PDOException $e) {
    // エラー発生時の処理
    exit("データベースに接続できませんでした。" . $e->getMessage());
}
?>
