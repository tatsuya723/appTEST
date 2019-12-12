<?php
session_start();
?>
<html>
<head>
    <title>PHPのテスト</title>
</head>
<body>
<hr size="1" noshade>
<h3>更新画面</h3>
<hr size="1" noshade>
[<a href="list.php">戻る</a>]
<br>

<?php
require_once("MYDB.php");
$pdo=db_connect();

if(isset($_GET['id']) && $_GET['id']>0){
    $id=$_GET['id'];
    $_SESSION['id']=$id;
}else{
    exit('パラメータが不正です。');
}


try{
    $sql="SELECT * FROM work WHERE id = :id";
    $stmh=$pdo->prepare($sql);
    $stmh->bindValue(':id', $id,PDO::PARAM_INT);
    //$stmh->bindValue(':work', $search_key,PDO::PARAM_STR);
    $stmh->execute();
    $count=$stmh->rowCount();
}catch(PDOException $Exception){
    print"エラー:" .$Exception->getMessage();
}

if($count<1){
    print"更新データなし。<BR>";
}else{
    $row=$stmh->fetch(PDO::FETCH_ASSOC);
?>

<form name="form1" method="post" action="list.php">
ID:<?=htmlspecialchars($row['id'])?><BR>
カードID   ：<input type="text" name="cardID" value="<?=htmlspecialchars($row['cardID'])?>"><br>
氏名       　　：<input type="text" name="member" value="<?=htmlspecialchars($row['member'])?>"><br>
レーン   ：<input type="text" name="rane" value="<?=htmlspecialchars($row['rane'])?>"><br>
作業時間：<input type="text" name="time" value="<?=htmlspecialchars($row['time'])?>"><br>
作業内容：<input type="text" name="work" value="<?=htmlspecialchars($row['work'])?>"><br>
日付    :<input type="text" name="data" value="<?=htmlspecialchars($row['data'])?>"><br>
<input type="hidden" name="action" value="update">
<input type="submit" value="更新">
</form>   

<?php
}
?>

</body>
</html>