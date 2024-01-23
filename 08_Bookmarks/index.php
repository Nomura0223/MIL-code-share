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
        <form action="submit.php" method="post">
            <div>
                <label for="book_name">書籍名:</label>
                <input type="text" id="book_name" name="book_name" required>
            </div>
            <div>
                <label for="book_url">書籍URL:</label>
                <input type="url" id="book_url" name="book_url" required>
            </div>
            <div>
                <label for="book_comment">コメント:</label>
                <textarea id="book_comment" name="book_comment" required></textarea>
            </div>
            <div>
                <button type="submit">追加</button>
            </div>
        </form>
    </div>
    <div style="display: flex; justify-content: center">
    <a href="list.php">登録済みの書籍一覧</a>
    </div>
</body>
</html>
