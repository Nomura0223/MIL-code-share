<?php
require_once('funcs.php');

// 1. POSTデータの取得
$id = $_GET['id'];


// 2. DB接続します
$pdo = db_conn();

// 3. データ登録SQL作成    
$sql = "DELETE FROM gs_bm_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// 4. データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect('list.php');
}
?>