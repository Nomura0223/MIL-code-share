<?php
session_start();
include("funcs.php");
sschk();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録済みのユーザー一覧</title>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div class="header">
        <h1>書籍ブックマークアプリ (ユーザー一覧)</h1>
        <div class="header-buttons">
            <a href="register_bm.php">書籍登録</a>
            <a href="select.php">書籍一覧</a>
            <a href="register.php">ユーザー登録</a>
            <a href="select_user.php">ユーザー一覧</a>
            <a href="logout.php">ログアウト</a>
        </div>
    </div>
    <div class="breadcrumb">
        <a href="./index.php">ホーム</a> > 登録済みのユーザー一覧
    </div>
    <div class="container">
        <h2>登録済みのユーザー一覧</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>ユーザー名</th>
                <th>ログインID</th>
                <th>ログインPW</th>
            </tr>
            <?php
            // 関数の読み込み
            require_once('funcs.php');

            // データベース接続情報

            $pdo = db_conn();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // データベースからデータを取得
            $stmt = $pdo->query("SELECT * FROM gs_user_table");

            // 取得したデータを行ごとに処理
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['lid']) . "</td>";
                echo "<td>" . htmlspecialchars($row['lpw']) . "</td>";

                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>