<html>
<head>
    <title>カード登録情報編集</title>
    <meta charset="utf-8">
</head>
<body>
<hr size="1" noshade>
<h3>データ更新画面</h3>
<hr size="1" noshade>
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
    <form name="form1" method="post" action="カード管理.php">
    <p>カードID:<?=htmlspecialchars($GET['id'])?></p><br>
    姓   ：     <input type="text" name="last_name" value="<?=htmlspecialchars($row['last_name'])?>"><br>
    名   ：     <input type="text" name="first_name" value="<?=htmlspecialchars($row['first_name'])?>"><br>
    作業内容：   <input type="text" name="work" value="<?=htmlspecialchars($row['work'])?>"><br>
                <input type="hidden" name="caad_id" value="<?=$row['card_id']?>">
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