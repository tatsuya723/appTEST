<?php
session_start();
?>
<html> 
<head>
    <title>setes1</title>
    <meta charset=utf-8>
    <link rel="stylesheet" type="text/css" href="tes1.css">
</head>

<body bgcolor="#e0ffff" text="#000000">

<?php
if((isset($_SESSION["pass"])) && ($_SESSION["pass"]==$pass)){
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
        die('エラー:'.$Exception->getMessage());
    }
    /*▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲
    ▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲*/

    try{
        $stmh=$pdo->query("SELECT * FROM b_2020_1");
        $stmh->execute();
    }catch(PDOException $Exception){
        print "エラー:".$Exception->getMessage();
    }
    ?>

    <table width="1300" border="1" cellspacing="2" cellpadding="18">
    <tbody>
    <tr><th>名前</th><th>作業時間[分]</th><th>作業内容</th><th>作業効率[%]</th><th>収穫ケース個数</th><th>レーン</th><th>年月日</th><th>時刻</th></tr>

    <?php
    $rs = $stmh->fetchall ();
    foreach ( $rs as $row ) {
    ?>

        <tr>
        <td align="center"><?=htmlspecialchars($row['member'])?></td>
        <td align="center"><?=htmlspecialchars($row['work_time'])?></td>
        <td align="center"><?=htmlspecialchars($row['work'])?></td>
        <?php
        if($row['eff']>80 && $row['work']=="収穫"){?>
            <td align="center" bgcolor="#7cfc00"><b><?=htmlspecialchars($row['eff'])?></b></td>
        <?php
        }elseif($row['eff']>50 && $row['work']=="収穫"){
        ?>
            <td align="center" bgcolor="#00bfff"><b><?=htmlspecialchars($row['eff'])?></b></td>
        <?php
        }elseif($row['eff']>30 && $row['work']=="収穫"){
        ?>
            <td align="center" bgcolor="#ffd700"><b><?=htmlspecialchars($row['eff'])?></b></td>
        <?php
        }elseif($row['eff']<30 && $row['work']=="収穫" && $row['eff']!=""){
        ?>
            <td align="center" bgcolor="#ff4500"><b><?=htmlspecialchars($row['eff'])?></b></td>
        <?php
        }else{
        ?>
            <td align="center"><?=htmlspecialchars($row['eff'])?></td>
        <?php
        }
        ?>
        <td align="center"><?=htmlspecialchars($row['bx'])?></td>
        <td align="center"><?=htmlspecialchars($row['rane'])?></td>
        <td align="center"><?=htmlspecialchars($row['d_ymd'])?></td>
        <td align="center"><?=htmlspecialchars($row['dt'])?></td>
        </tr>

    <?php
    }
}else{
    print "エラー<br>";
    ?>
    <a href="セッションテスト.html"><font size="5">ログインしてください。</font></a><br>
    <?php
}
    ?>

</body>
</html>
