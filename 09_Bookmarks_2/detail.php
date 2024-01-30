<?php
ini_set('display_errors', 'On'); // エラーを表示させるようにしてください
error_reporting(E_ALL); // 全てのレベルのエラーを表示してください
?>

<?php
//１．PHP
$id = $_GET["id"]; //idを受け取る
require_once("funcs.php");  //funcs.phpを読み込む（関数群）
$pdo = db_conn();      //DB接続関数

//２．データ登録SQL作成
$stmt   = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id = :id"); //SQLをセット
$stmt -> bindValue(":id", $id, PDO::PARAM_INT); //idは数値なのでINT
$status = $stmt->execute(); //SQLを実行→エラーの場合falseを$statusに代入

//３．データ表示
$view=""; //HTML文字列作り、入れる変数
if($status==false) {
  //SQLエラーの場合
  sql_error($stmt);
}else{
  //SQL成功の場合
  $row = $stmt->fetch(); //1レコードだけ取得する方法
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>書籍ブックマークアプリ</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="header">
        <h1>書籍ブックマークアプリ</h1>
    </div>
    <div class="breadcrumb">
        <a href="index.php">ホーム</a> > 書籍ブックマーク追加
    </div>
    <div class="container">
        <form action="update.php" method="post">
            <div>
                <label for="book_name">書籍名:</label>
                <input type="text" id="book_name" name="book_name" required value="<?=$row["name"]?>">
            </div>
            <div>
                <label for="book_url">書籍URL:</label>
                <input type="url" id="book_url" name="book_url" required value="<?=$row["url"]?>">
            </div>
            <div>
                <label for="book_comment">コメント:</label>
                <textarea id="book_comment" name="book_comment" required><?=$row["comment"]?></textarea>
            </div>
            <input type="hidden" name="id" value="<?=$row["id"]?>">
            <div>
                <button type="submit">更新
                </button>
            </div>
        </form>
    </div>
    <div style="display: flex; justify-content: center">
    <a href="list.php">登録済みの書籍一覧</a>
    </div>
</body>
</html>
