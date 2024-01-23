<?php
$host = "localhost";
$dbname = "gs_bm";
$user = "root";

// サンプルデータ配列
$sampleData = [
    ["name" => "サンプル書籍1", "url" => "https://example.com/book1", "comment" => "面白い本でした。"],
    ["name" => "サンプル書籍2", "url" => "https://example.com/book2", "comment" => "参考になりました。"],
    ["name" => "サンプル書籍3", "url" => "https://example.com/book3", "comment" => "ためになる内容です。"],
    ["name" => "サンプル書籍4", "url" => "https://example.com/book4", "comment" => "興味深いテーマ。"],
    ["name" => "サンプル書籍5", "url" => "https://example.com/book5", "comment" => "読むべき本です。"],
    ["name" => "サンプル書籍6", "url" => "https://example.com/book6", "comment" => "思いがけない洞察がある。"],
    ["name" => "サンプル書籍7", "url" => "https://example.com/book7", "comment" => "非常に教育的。"],
    ["name" => "サンプル書籍8", "url" => "https://example.com/book8", "comment" => "すばらしいストーリー。"],
    ["name" => "サンプル書籍9", "url" => "https://example.com/book9", "comment" => "感動しました。"],
    ["name" => "サンプル書籍10", "url" => "https://example.com/book10", "comment" => "多くのインスピレーションを与えてくれる。"]
];

try {
    $pdo = new PDO("mysql:dbname=$dbname;charset=utf8;host=$host", $user, '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 既存のデータを一旦削除する (オプショナル)
    $pdo->exec("DELETE FROM gs_bm_table");

    // サンプルデータの挿入
    foreach ($sampleData as $data) {
        $stmt = $pdo->prepare("INSERT INTO gs_bm_table (name, url, comment, indate) VALUES (:name, :url, :comment, sysdate())");
        $stmt->bindParam(':name', $data['name'], PDO::PARAM_STR);
        $stmt->bindParam(':url', $data['url'], PDO::PARAM_STR);
        $stmt->bindParam(':comment', $data['comment'], PDO::PARAM_STR);
        $stmt->execute();
    }

    // 登録ページへリダイレクト
    header("Location: index.php");
    exit;

} catch (PDOException $e) {
    exit("データベースに接続できませんでした。" . $e->getMessage());
}
?>
