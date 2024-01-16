<!-- <?php
        // data.txtの読み込み
        $file = fopen("data/data.txt", "r");

        // ファイル内容を1行ずつ読み込んで出力
        while ($str = fgets($file)) {
            echo nl2br($str); // nl2br() ... 改行文字を追加
            var_dump(explode(",", $str));
        }
        fclose($file);
        ?> -->

<?php
include("funcs.php");
// data.txtファイルを読み込む
$filename = "data/data.txt";
$data = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// データを解析して配列に格納する
$surveyData = [];
foreach ($data as $line) {
    // var_dump($line."<br>");
    $surveyData[] = str_getcsv($string = $line, $separator = ","); // 配列追加
}


// 選択肢に関するデータを集計する
$understandingCount = array_count_values(array_column($surveyData, 3));
$paceCount = array_count_values(array_column($surveyData, 4));

// デバッグ用出力
// echo "理解度の集計: "; 
// print_r($understandingCount);
// var_dump($understandingCount);
// echo "<br>ペースの集計: ";
// print_r($paceCount);
// echo "<br>最大カウント: $maxCount <br>";

?>



<!DOCTYPE html>
<html>

<head>
    <title>アンケート結果</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        td,
        th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            text-align: left;
            background-color: #f2f2f2;
        }

        .chart-container {
            width: 400px;
            height: 400px;
        }

        .bar-chart {
            display: flex;
            align-items: flex-end;
            height: 200px;
            width: 100%;
            background-color: #f4f4f4;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ddd;
        }

        .bar {
            flex: 1;
            margin: 0 5px;
            display: flex;
            justify-content: center;
            align-items: flex-end;
            font-size: 14px;
            color: white;
        }

        .bar-inner {
            width: 100%;
            background-color: #4CAF50;
            text-align: center;
            box-sizing: border-box;
            border: 1px solid #ddd;
        }
    </style>
</head>


<body>
    <h2>アンケート結果</h2>
    <table>
        <!--1行目-->
        <tr>
            <th>日時</th>
            <th>名前</th>
            <th>メールアドレス</th>
            <th>理解度</th>
            <th>ペース</th>
            <th>コメント</th>
        </tr>
        <!--2行目以降-->
        <?php foreach ($surveyData as $row) : ?>
            <tr>
                <td><?= h($row[0], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= h($row[1], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= h($row[2], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= h($row[3], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= h($row[4], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= h($row[5], ENT_QUOTES, 'UTF-8') ?></td>
            </tr>
        <?php endforeach; ?>
    </table>


    <!-- メモ: 処理はJavaScriptに渡すこともできる -> 今回であればChart.jsを活用できる-->




    <!-- 理解度の棒グラフ -->
    <?php
    $understandingCount = json_encode($understandingCount);
    $paceCount = json_encode($paceCount);
    ?>
    <script>
        let understandingCount_dict = JSON.parse('<?php echo $understandingCount; ?>');
        let paceCount_dict = JSON.parse('<?php echo $paceCount; ?>');
        console.log(understandingCount_dict);
    </script>
    <div>
        <h3>理解度</h3>
        <canvas id="myChart1"></canvas>
        <h3>ペース</h3>
        <canvas id="myChart2"></canvas>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx1 = document.getElementById('myChart1');
        const ctx2 = document.getElementById('myChart2');

        new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['1', '2', '3'],
                datasets: [{
                    label: '# of Votes',
                    data: [understandingCount_dict["1"], understandingCount_dict["2"], understandingCount_dict["3"]],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                        }
                    }
                }
            }
        });


        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['1', '2', '3'],
                datasets: [{
                    label: '# of Votes',
                    data: [paceCount_dict["1"], paceCount_dict["2"], paceCount_dict["3"]],
                    backgroundColor: 'rgba(255, 0, 0, 0.2)', // 赤い背景色
                    borderColor: 'rgba(255, 0, 0, 1)', // 赤いボーダーの色 
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                        }
                    }
                }
            }
        });
    </script>
    <h3>リンク</h3>
    <ul>
        <li><a href="post.php">アンケート入力</a></li>
        <!-- <li><a href="write.php">write.php</a></li> -->
        <!-- <li><a href="read.php">read.php</a></li> -->

    </ul>

</body>

</html>