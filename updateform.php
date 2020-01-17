<html>
<head>
    <title>カード登録情報編集</title>
    <meta charset="utf-8">
</head>
<body>
<hr size="9" noshade>
<h1>#データ更新ページ</h1>
<hr size="4" noshade>
[<a href="カード管理.php">戻る</a>]
<br>

<?php
/*▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲
    //DB接続処理
▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲*/
$dbhost="ec2-174-129-255-46.compute-1.amazonaws.com";
$dbname="dflv6jh505d9tv";
$dbuser="qajdgcrnucpdpx";
$dbpass="d2144f11fa2bc512c9f5f4d65cef0b1f804fabef86759d786bd6ca430eba6fa8";
$dbtype="pgsql";
$dsn = "$dbtype:dbname=$dbname host=$dbhost port=5432";
try{
    $pdo=new PDO($dsn,$dbuser,$dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    //print"接続しました<br>";
}catch(PDOException $Exception){
    die('エラー:'.$Exception->getMessage());}
/*▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲
▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲*/

if(isset($_GET['id'])){

$tabsel = "SELECT * FROM sample_member";
try{
    $stmh=$pdo->query($tabsel);
    $stmh->execute();
}catch(PDOException $Exception){
    print "エラー:".$Exception->getMessage();
}


$rs = $stmh->fetchall ();
foreach ( $rs as $row ) {
    if($row['card_id']==$_GET['id']){
    ?>
    <font size="3" color="#000000">カードID：</font><font size="4" color="#ff0000"><?=htmlspecialchars($row['card_id'])?></font>
    <br>
    <form name="form1" method="post" action="uptab.php">
    姓　　　：   <input type="text" name="last_name" value="<?=htmlspecialchars($row['last_name'])?>"><br>
    名　　　：   <input type="text" name="first_name" value="<?=htmlspecialchars($row['first_name'])?>"><br>
    作業内容：   <input type="text" name="work" value="<?=htmlspecialchars($row['work'])?>"><br>
                <input type="hidden" name="card_id" value="<?=$row['card_id']?>">
                <input type="hidden" name="action" value="update">
                <input type="submit" value="更新">
    </form> 
    
    <?php    
    }
}//foreachの括弧

?>

  

<?php
}
?>

</body>
</html>