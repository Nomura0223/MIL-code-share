<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録済みの書籍一覧</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="header">
        <h1>書籍ブックマークアプリ</h1>
    </div>
    <div class="breadcrumb">
        <a href="./index.php">ホーム</a> > 登録済みの書籍一覧
    </div>
    <div class="container">
        <h2>登録済みの書籍一覧</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>書籍名</th>
                <th>URL</th>
                <th>コメント</th>
                <th>登録日時</th>

            </tr>
            <?php
            // データベース接続設定の読み込み
            require_once('config.php');
            // $host = 'localhost';
            // $dbname = 'gs_bm';
            // $username = 'root';
            // $password = '';

            try {
                $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // データベースからデータを取得
                $stmt = $pdo->query("SELECT * FROM gs_bm_table");

                // 取得したデータを行ごとに処理
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td class='url-cell'><a href='" . htmlspecialchars($row['url']) . "'>" . htmlspecialchars($row['url']) . "</a></td>";
                    echo "<td>" . htmlspecialchars($row['comment']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['indate']) . "</td>";

                    echo "</tr>";
                }
            } catch (PDOException $e) {
                echo "データベースエラー: " . $e->getMessage();
                die();
            }
            ?>
        </table>
    </div>
</body>

</html>