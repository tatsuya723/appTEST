<?php
session_start();
?>
<html> 
<head>
    <title>ホームページ</title>
    <meta charset=utf-8>
    <link rel="stylesheet" type="text/css" href="tes1.css">
</head>

<body bgcolor="#e0ffff" text="#000000">

<?php
$pass="style";
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
?>

    <hr size="9" noshade>
    <h1>#ホーム画面</h1>
    <hr size="4" noshade>
    <br>
    <font >
    <?php
    if((isset($_SESSION["pass"])) && ($_SESSION["pass"]==$pass)){
    ?>
    <a href="作業記録.php"><font size="5">作業記録管理ページ</font></a><br>
    <?php
    }else{
    ?>
    <a href="ログイン.html"><font size="5">作業記録管理ページ</font></a><br>
    <?php
    }
    ?>
    <a href="カード管理.php"><font size="5">カード管理ページ</font></a><br>
    <a href="セッションテスト.html"><font size="5">パスワードてすと</font></a><br>
    <br><br>
    <hr size="4" noshade>
    <h2>作業の状況</h2>
    <hr size="4" noshade>

<?php
try{
    $stmh=$pdo->query("SELECT * FROM sample_member");
    $stmh->execute();
}catch(PDOException $Exception){
    print "エラー:".$Exception->getMessage();
}

$rs = $stmh->fetchall ();
$count = 0;
foreach ( $rs as $row ) {
    if($row['rane'] != "0"){
?>
    <h3><?=$row['last_name']?>:　<font color="#ff0000"><?=$row['rane']?></font>レーン [<?=$row['work']?>]</h3>
<?php
    $count += 1;
    }
}
?>
<h4>作業中の人数：<?=$count?>人</h4>
</body>
</html>