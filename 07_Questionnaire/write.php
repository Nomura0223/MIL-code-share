<?php
// POST送信でなければ、処理を中止
if (!isset($_POST["name"])) {
    exit("ERROR: POSTメソッドでアクセスしてください。");
}

// POSTデータ取得
$name = $_POST["name"];
$mail = $_POST["mail"];
$understanding = $_POST["understanding"];
$pace = $_POST["pace"];
$comments = $_POST["comments"];

//文字作成
$str = date("Y-m-d H:i:s") . "," . $name . "," . $mail . "," . $understanding . "," . $pace . "," . $comments;

//File書き込み
$file = fopen("data/data.txt", "a");    // ファイル読み込み
if ($file) {
    // ファイル書き込み
    fwrite($file, $str . "\n");
    fclose($file);
    $message = "ご回答ありがとうございました！";
} else {
    $message =  "ファイルの書き込みに失敗しました。";
}
?>

<html>

<head>
    <meta charset="utf-8">
    <title>アンケート回答完了</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 50px;
        }

        .message {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            display: inline-block;
        }
    </style>
</head>

<body>
    <div class="message">
        <h2>アンケート回答完了</h2>
        <p><?php echo $message; ?></p>
    </div>
    <!-- <h1>書き込みしました。</h1>
    <h2>./data/data.txt を確認しましょう！</h2> -->

    <ul>
        <li><a href="post.php">post.php</a></li>
        <li><a href="read.php">read.php</a></li>
        <li><a href="data/data.txt">data.txt</a></li>
        <!-- <li><a href="input.php">戻る</a></li> -->
    </ul>
</body>

</html>