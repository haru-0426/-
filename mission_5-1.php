<?php	   
$dsn = 'mysql:dbname=tb＊＊＊＊db;host=localhost';
	$user = '＊＊＊';
	$password = '＊＊＊';
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
	$sql = "CREATE TABLE IF NOT EXISTS tbtest_728"

	." ("
	. "id INT AUTO_INCREMENT PRIMARY KEY,"
	. "name char(32),"
	. "comment TEXT"
	.");";
	$stmt = $pdo->query($sql);
	$sql ='SHOW TABLES';
	$result = $pdo -> query($sql);
	foreach ($result as $row){
		echo $row[0];
		echo '<br>';
	}
	echo "<hr>";
	$sql ='SHOW CREATE TABLE tbtest_728';
	$result = $pdo -> query($sql);
	foreach ($result as $row){
		echo $row[1];
	}
	echo "<hr>";
	?>
<!DOCTYPE HTML>
<html lang="ja">

<head>
</head>

<body>
    <form method="post" action="">
        <input type="text" name="name" value="">
        <input type="text" name="comment" value="">
        <input type="submit" name="regist" value="登録"><br>
        <input type="text" name="edit_number" value="">
        <input type="text" name="edit_name"  value="">
        <input type="text" name="edit_comment" value="">
        <input type="submit" name="edit" value="編集"><br>
        <input type="text" name="del_number" value="">
        <input type="text" name="password" value="">
        <input type="submit" name="delet" value="削除">
     </form>
</body>
</html>
<?php
 if( isset($_POST['regist']) ){
  $dsn = 'mysql:dbname=tb*****db;host=localhost';
	$user = 'tb-****';
	$password = '*******';
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
	$sql = $pdo -> prepare("INSERT INTO tbtest_728 (name, comment) VALUES (:name, :comment)");
	$sql -> bindParam(':name', $name, PDO::PARAM_STR);
	$sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
	$name = $_POST["name"];
	$comment = $_POST["comment"]; //好きな名前、好きな言葉は自分で決めること
	$sql -> execute();

	$sql = 'SELECT * FROM tbtest_728';
	$stmt = $pdo->query($sql);
	$results = $stmt->fetchAll();
	foreach ($results as $row){
		//$rowの中にはテーブルのカラム名が入る
		echo $row['id'].',';
		echo $row['name'].',';
		echo $row['comment'].'<br>';
	echo "<hr>";
	}
 }else{
  if( isset($_POST['edit']) ){
  $dsn = 'mysql:dbname=tb*****db;host=localhost';
	$user = 'tb-*****';
	$password = '*******';
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
	$sql = 'SELECT * FROM tbtest_728 WHERE id=:id ';
$sql = 'SELECT * FROM tbtest_728';
	$stmt = $pdo->query($sql);
	$results = $stmt->fetchAll();
	foreach ($results as $row){
		//$rowの中にはテーブルのカラム名が入る
		echo $row['id'].',';
		echo $row['name'].',';
		echo $row['comment'].'<br>';
	echo "<hr>";
	}
$id = $_POST["edit_number"]; //変更する投稿番号
	$name = $_POST["edit_name"];
	$comment = $_POST["edit_comment"]; //変更したい名前、変更したいコメントは自分で決めること
	$sql = 'UPDATE tbtest_728 SET name=:name,comment=:comment WHERE id=:id';
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':name', $name, PDO::PARAM_STR);
	$stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
}
?>
<?php
if(isset($_POST["delet"])){
$dsn = 'mysql:dbname=tb******db;host=localhost';
	$user = 'tb-******';
	$password = '*******';
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
	$id = $_POST["del_number"]; ;
	//$del_number="id";
	$sql = 'delete from tbtest_728 where id=:id';
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
	$sql = 'SELECT * FROM tbtest_728 id=:id';
	$stmt = $pdo->query($sql);
	$results = $stmt->fetchAll($password=$_POST["password"]);
	foreach ($results as $row){
		//$rowの中にはテーブルのカラム名が入る
		echo $row['id'].',';
		echo $row['name'].',';
		echo $row['comment'].'<br>';
	echo "<hr>";
	}
 }
 }
	?>