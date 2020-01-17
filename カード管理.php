<html>
    <head>
        <title>カード管理ページ</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="tes1.css">
    </head>
    <body text="#000000">
    <hr size="9" noshade>
    <h1>#カード管理ページ</h1>
    <hr size="4" noshade>
    <a href="index.php">ホームページへ</a><br>
    <!--[<a href="form.html">新規登録</a>]<br>
    
    <form name="form1" method="post" action="list.php">
    名前で検索:<input type="text" name="search_key">
    <input type="submit" value="検索する">
    </form>-->

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
        die('エラー:'.$Exception->getMessage());
    }
    /*▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲
    ▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲*/
    ?>
    <?php
    //更新処理
    if(isset($_POST['action']) && $_POST['action']=='update'){
        try{
            $stmh=$pdo->query("UPDATE sample_member SET work = '". $_POST['work'] . "' last_name = '" . $_POST['last_name'] . "' first_name = '" . $_POST['first_name'] . "' WHERE card_id = '" . $_POST['card_id'] . "'");
            $stmh->execute();
            print "データを更新しました。";
        }catch(PDOException $Exception){
            print "エラー:".$Exception->getMessage();
        } 


    }else{//全データを表示する。
        $tabsel = "SELECT * FROM sample_member";
        try{
            $stmh=$pdo->query($tabsel);
            $stmh->execute();
        }catch(PDOException $Exception){
            print "エラー:".$Exception->getMessage();
        }
        ?>
                
        <table width="1100" border="1" cellspacing="2" cellpadding="18">
        <tbody>
        <tr><th>カードID</th><th>姓</th><th>名</th><th>作業内容</th></tr>
        
        <?php
        $rs = $stmh->fetchall ();
        foreach ( $rs as $row ) {  
        ?> 
            <tr>
            <td align="center"><?=htmlspecialchars($row['card_id'])?></td>
            <td align="center"><?=htmlspecialchars($row['last_name'])?></td>
            <td align="center"><?=htmlspecialchars($row['state'])?></td>
            <td align="center"><b><?=htmlspecialchars($row['rane'])?></b></td>
            <td align="center"><a href="updateform.php?id=<?=htmlspecialchars($row['card_id'])?>">編集</td>
            </tr>
        <?php
        }//foreachの括弧
    }
    ?>

    </body>
</html>