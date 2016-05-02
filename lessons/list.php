<?php session_start(); ?>
<html>
	<head>
		<title>DB OPERATION</title>
	</head>
	<body>
		<hr size="1" noshade>
		会員名簿一覧
		<hr size="1" noshade>
		[<a href="form.html">新規登録</a>]
		<br>
		<form name="form1" method="post" action="list.php">
			名前：
			<input type="text" name="search_key">
			<input type="submit" value="検索">
		</form>
		<?php
		require_once("MYDB.php");
		$pdo = db_connect();

		//削除
		if(isset($_GET['id']) && $_GET['action'] == 'delete' && $_GET['id'] > 0){
			try{
				$pdo->beginTransaction();
				$id = $_GET['id'];
				$sql = "DELETE FROM member WHERE id = :id";
				$stmh = $pdo->prepare($sql);
				$stmh->bindValue(':id', $id, PDO::PARAM_INT);
				$stmh->execute();
				$pdo->commit();
				
				print "データを".$stmh->rowCount()."件削除しました。<br>";
			}catch(PDOException $Exception){
				$pdo->rollBack();
				print "Error:".$Exception.error_log();
			}
		}

		//挿入
		if(isset($_POST['action']) && $_POST['action'] == 'insert'){
			print "new";
			try {
				$pdo->beginTransaction();
				$sql = "INSERT INTO member (last_name, first_name, age) VALUES ( :last_name, :first_name, :age)";
				$stmh = $pdo->prepare($sql);
				$stmh->bindValue(':last_name', $_POST['last_name'], PDO::PARAM_STR);
				$stmh->bindValue(':first_name', $_POST['first_name'], PDO::PARAM_STR);
				$stmh->bindValue(':age', $_POST['age'], PDO::PARAM_INT);
				$stmh->execute();
				$pdo->commit();
				print "データを".$stmh->rowCount()."件、挿入しました。<br>";
			}catch(PDOException $Exception){
				$pdo->rollBack();
				print "エラー：".$Exception->getMessage();
			}
		}

		//更新
		if(isset($_POST['action']) && $_POST['action'] == 'update'){
			$id = $_SESSION['id'];

			try{
				$pdo->beginTransaction();
				$sql = "UPDATE member 
						SET
						last_name = :last_name,
						first_name = :first_name,
						age = :age
						WHERE id = :id";
				$stmh = $pdo->prepare($sql);
				$stmh->bindValue(':last_name', $_POST['last_name'], PDO::PARAM_STR);
				$stmh->bindValue(':first_name', $_POST['first_name'], PDO::PARAM_STR);
				$stmh->bindValue(':age', $_POST['age'], PDO::PARAM_INT);
				$stmh->bindValue(':id', $id, PDO::PARAM_INT);
				$stmh->execute();
				$pdo->commit();
				print "データを".$stmh->rowCount()."件、更新しました。<br>";
			}catch(PDOException $Exception){
				$pdo->rollBack();
				print "エラー：".$Exception.getMessage();
			}
			unset($_SESSION['id']);
		}
		
		//検索＆表示
		try {
			if(isset($_POST['search_key']) && $_POST['search_key'] != ""){
				$search_key = '%'.$_POST['search_key'].'%';
				$sql = "SELECT * FROM member WHERE last_name like :last_name OR first_name like :first_name";
				$stmh = $pdo->prepare($sql);
				$stmh->bindValue(':last_name', $search_key, PDO::PARAM_STR);
				$stmh->bindValue(':first_name', $search_key, PDO::PARAM_STR);
				$stmh->execute();
			}else{
				$sql = "SELECT * FROM member";
				$stmh = $pdo->query($sql);
			}
			$count = $stmh->rowCount();
			print "検索結果は".$count."件です。<br>";
		}catch(PDOException $Exception){
			print "エラー：".$Exception->getMessage();
		}
		

		if($count < 1){
			print "検索結果がありません。<br>";
		}else{
		?>

		<table width="450" border="1" cellspacing="0" cellpadding="8">
			<tbody>
				<tr><th>番号</th><th>氏</th><th>名</th><th>年齢</th><th>&nbsp;</th><th>&nbsp;</th></tr>
		<?php
					while($row=$stmh->fetch(PDO::FETCH_ASSOC)){
		?>
						<tr>
							<td align="center"><?=htmlspecialchars($row['id'])?></td>
							<td align="center"><?=htmlspecialchars($row['last_name'])?></td>
							<td align="center"><?=htmlspecialchars($row['first_name'])?></td>
							<td align="center"><?=htmlspecialchars($row['age'])?></td>
							<td align="center">
								<a href=updateform.php?id=<?=htmlspecialchars($row['id'])?>>更新</a>
							</td>
							<td align="center">
								<a href=list.php?action=delete&id=<?=htmlspecialchars($row['id'])?>>削除</a>
							</td>
						</tr>
		<?php
					}
		?>
			</tbody>
		</table>
		<?php
		}
		?>
	</body>
</html>