<?php
// ユーザー登録処理を行うPHPファイル

require_once('funcs.php');

// 1. POSTデータの取得
$uname = $_POST['uname']; // ユーザー名
$lid = $_POST['lid']; // ユーザーID
$lpw = $_POST['lpw']; // パスワード
$lpw_confirm = $_POST['lpw_confirm']; // パスワード（確認用）

// パスワードの確認
if ($lpw != $lpw_confirm) {
    echo "<script>alert('パスワードが一致しません'); window.location = 'register.php';</script>";
    exit;
}

// パスワードのハッシュ化
$lpw_hash = password_hash($lpw, PASSWORD_DEFAULT);

// 2. DBへの接続
$pdo = db_conn();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// 3. データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_user_table (name, lid, lpw, kanri_flg, life_flg) VALUES (:name, :lid, :lpw, 0, 0)");
$stmt->bindParam(':name', $uname, PDO::PARAM_STR);
$stmt->bindParam(':lid', $lid, PDO::PARAM_STR);
$stmt->bindParam(':lpw', $lpw_hash, PDO::PARAM_STR); // ハッシュ化したパスワードを保存
$status = $stmt->execute();

// 4. データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    // 登録完了メッセージを表示し、ログインページにリダイレクト
    echo "<script>alert('登録が完了しました。'); window.location = 'login.php';</script>";
    exit;
}
?>
