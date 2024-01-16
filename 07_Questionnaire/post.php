<html>

<head>
	<meta charset="utf-8">
	<title>講義アンケート</title>
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
	</style>
</head>

<body>

	<form action="write.php" method="post">
		<h2>プログラミング講義アンケート</h2>

		<table>
			<tr>
				<th>質問</th>
				<th>回答</th>
			</tr>
			<tr>
				<td>お名前:</td>
				<td><input type="text" name="name" required></td>
			</tr>
			<tr>
				<td>メールアドレス:</td>
				<td><input type="text" name="mail" required></td>
			</tr>

			<tr>
				<td>講義の内容は理解できましたか？</td>
				<td>
					<select name="understanding" required>
						<option value="">選択してください</option>
						<option value="1">1 - 理解できない</option>
						<option value="2">2 - まあまあ理解できる</option>
						<option value="3">3 - 完全に理解できる</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>講義のペースはどうでしたか？</td>
				<td>
					<select name="pace" required>
						<option value="">選択してください</option>
						<option value="1">1 - 速い</option>
						<option value="2">2 - 適切</option>
						<option value="3">3 - 遅い</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>講義の内容についてのコメント：</td>
				<td><textarea name="comments" rows="4" cols="50"></textarea></td>
			</tr>
		</table>
		<br>
		<input type="submit" value="送信" style="align-items: end;">

		<!-- <p>
			お名前: <input type="text" name="name">
		</p>
		EMAIL: <input type="text" name="mail">

		<input type="submit" value="送信"> -->
	</form>
    <h3>リンク</h3>
    <ul>
        <!-- <li><a href="post.php">アンケート入力</a></li> -->
        <!-- <li><a href="write.php">write.php</a></li> -->
        <li><a href="read.php">アンケート結果</a></li>

    </ul>
</body>

</html>