<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン - 書籍ブックマークアプリ</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="header">
        <h1>書籍ブックマークアプリ (ログイン)</h1>
    </div>
    <div class="breadcrumb">
        <a href="index.php">ホーム</a> > ログイン
    </div>
    <div class="container">
        <form action="login_act.php" method="post">
            <div>
                <label for="username">ユーザーID (例: test1):</label>
                <input type="text" id="username" name="lid" required>
            </div>
            <div>
                <label for="password">パスワード (例: test1):</label>
                <input type="password" id="password" name="lpw" required>
            </div>
            <div>
                <button type="submit">ログイン</button>
            </div>
            <!-- <div style="text-align: center">
                <a href="register.php">アカウントを持っていない方はこちら</a>
            </div> -->
        </form>
    </div>
</body>
</html>
