<?php
session_start();
include("funcs.php");
sschk();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>アカウント登録 - 書籍ブックマークアプリ</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="header">
        <h1>書籍ブックマークアプリ (ユーザー登録)</h1>
        <div class="header-buttons">
            <a href="register_bm.php">書籍登録</a>
            <a href="select.php">書籍一覧</a>
            <a href="register.php">ユーザー登録</a>
            <a href="select_user.php">ユーザー一覧</a>
            <a href="logout.php">ログアウト</a>
        </div>
    </div>

    <div class="breadcrumb">
        <a href="index.php">ホーム</a> > ユーザー登録
    </div>
    <div class="container">
        <form action="register_act.php" method="post">
            <div>
                <label for="user">ユーザー名:</label>
                <input type="text" id="user" name="uname" required>
            </div>
            <div>
                <label for="username">ユーザーID:</label>
                <input type="text" id="username" name="lid" required>
            </div>
            <div>
                <label for="password">パスワード:</label>
                <input type="password" id="password" name="lpw" required>
            </div>
            <div>
                <label for="password2">パスワード (確認):</label>
                <input type="password" id="password2" name="lpw_confirm" required>
            </div>
            <div>
                <button type="submit">登録</button>
            </div>
            <!-- <div style="text-align: center">
                <a href="index.php">既にアカウントを持っている方はこちら</a>
            </div> -->
        </form>
    </div>
</body>

</html>