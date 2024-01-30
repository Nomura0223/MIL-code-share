<?php
require_once('funcs.php');

// 1. POSTデータの取得
$book_name = $_POST['book_name'];
$book_url = $_POST['book_url'];
$book_comment = $_POST['book_comment'];
$id = $_POST['id'];

echo $book_name;
echo $book_url;
echo $book_comment;
echo $id;

// 2. DB接続します
// データベースへの接続
$pdo = db_conn();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// 3. データ登録SQL作成    
$sql = "UPDATE gs_bm_table SET name=:name, url=:url, comment=:comment WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':name', $book_name, PDO::PARAM_STR);
$stmt->bindParam(':url', $book_url, PDO::PARAM_STR);
$stmt->bindParam(':comment', $book_comment, PDO::PARAM_STR);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// 4. データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect('list.php');
}
