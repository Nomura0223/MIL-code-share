<?php
// データベースに情報を追加するためのPHPファイル

require_once('funcs.php');

// 1. POSTデータの取得
$book_name = $_POST['book_name'];
$book_url = $_POST['book_url'];
$book_comment = $_POST['book_comment'];

// 2. DBへの接続
$pdo = db_conn();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// 3. データ登録SQL作成    
$stmt = $pdo->prepare("INSERT INTO gs_bm_table (name, url, comment, indate) VALUES (:name, :url, :comment, sysdate())");
$stmt->bindParam(':name', $book_name, PDO::PARAM_STR);
$stmt->bindParam(':url', $book_url, PDO::PARAM_STR);
$stmt->bindParam(':comment', $book_comment, PDO::PARAM_STR);
$status = $stmt->execute();

// 4. データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    // 登録ページへリダイレクト
    redirect('index.php');
    // header("Location: index.php");
    // exit;
}
