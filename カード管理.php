<?php session_start();?>
<html>
    <head>
        <title>カード情報管理</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="tes1.css">
    </head>
    <body bgcolor="#e0ffff" text="#000000">
    <a href="main.html">ホームページへ</a><br>
    <hr size="2" noshade>
    <h2>カード情報管理</h2>
    <hr size="2" noshade>
    [<a href="form.html">新規登録</a>]<br>
    
    <form name="form1" method="post" action="list.php">
    名前で検索:<input type="text" name="search_key">
    <input type="submit" value="検索する">
    </form>


    <?php
    require_once("MYDB.php");
    $pdo=db_connect();

    //削除処理
    if(isset($_GET['action']) && $_GET['action']=='delete' && $_GET['id']>0 ){
        try{
            $pdo->beginTransaction();
            $id=$_GET['id'];
            $sql="DELETE FROM CARD WHERE id=:id";
            $stmh=$pdo->prepare($sql);
            $stmh->bindValue(':id',$id,PDO::PARAM_INT);
            $stmh->execute();
            $pdo->commit();
            print"データを".$stmh->rowCount()."件、削除しました。<br>";
        }catch(PDOException $Exception){
            $pdo->rollBack();
            print"エラー:".$Exception->getMessage();
        }
    }


    //挿入処理
    if(isset($_POST['action']) && $_POST['action']=='insert'){
        try{
            $pdo->beginTransaction();
            $sql="INSERT INTO CARD(cardID,member,work,info1,info2)VALUES(:cardID,:member,:work,:info1,:info2)";
            $stmh=$pdo->prepare($sql);
            $stmh->bindValue(':cardID',$_POST['cardID'],PDO::PARAM_STR);
            $stmh->bindValue(':member',$_POST['member'],PDO::PARAM_STR);
            $stmh->bindValue(':work',$_POST['work'],PDO::PARAM_STR);
            $stmh->bindvalue(':info1',$_POST['info1'],PDO::PARAM_STR);
            $stmh->bindvalue(':info2',$_POST['info2'],PDO::PARAM_STR);
            $stmh->execute();
            $pdo->commit();
            print"データを".$stmh->rowCount()."件、挿入しました。<br>";
        }catch(PDOException $Exception){
            $pdo->rollBack();
            print"エラー:".$Exception->getMessage();
        } 
    }



    //更新処理
    if(isset($_POST['action']) && $_POST['action']=='update'){
        $id=$_SESSION['id'];//セッション変数によりidを受け取る。

        try{
            $pdo->beginTransaction();
            $sql="UPDATE CARD 
                SET
                cardID = :cardID,
                member = :member,
                work   = :work,
                info1  = :info1,
                info2  = :info2
                WHERE　id = :id";
        
            $stmh=$pdo->prepare($sql);
            $stmh->bindValue(':cardID',$_POST['cardID'],PDO::PARAM_STR);
            $stmh->bindValue(':member',$_POST['member'],PDO::PARAM_STR);
            $stmh->bindValue(':work',$_POST['work'],PDO::PARAM_STR);
            $stmh->bindValue(':info1',$_POST['info1'],PDO::PARAM_STR);
            $stmh->bindValue(':info2',$_POST['info2'],PDO::PARAM_STR);
            $stmh->bindValue(':id',$_POST['id'],PDO::PARAM_INT);
            $stmh->execute();
            $pdo->commit();
            print"データを".$stmh->rowCount()."件、更新しました。<br>";
        }catch(PDOException $Exception){
            $pdo->rollBack();
            print"エラー:".$Exception->getMessage();
        } 

        unset($_SESSION['id']);
    }




    //検索および現在の全データを表示する。
    try{
        if(isset($_POST['search_key']) && $_POST['search_key']!=""){
            $search_key='%'. $_POST['search_key'].'%';
            $sql="SELECT * FROM CARD WHERE cardID like :cardID OR member like :member OR work like :work ";
            $stmh=$pdo->prepare($sql);
            $stmh->bindValue(':cardID',$search_key,PDO::PARAM_STR);
            $stmh->bindValue(':member',$search_key,PDO::PARAM_STR);
            $stmh->bindValue(':work',$search_key,PDO::PARAM_STR);
            $stmh->execute();
        }else{
            $sql="SELECT * FROM CARD";
            $stmh=$pdo->query($sql);
        }
        $count=$stmh->rowCount();
        print"検索結果は" .$count."件です。<br>";
    }catch(PDOException $Exception){
        
        print"エラー:".$Exception->getMessage();
    } 
    if($count<1){
        print "検索結果がありません。<br>";
    }else{
        ?>
    <table width="1100" border="1" cellspacing="2" cellpadding="18">
    <tbody>
    <tr><th>番号</th><th>カードID</th><th>氏名</th><th>作業内容</th><th>その他1</th><th>その他2</th><th>&nbsp;</th><th>&nbsp;</th></tr>
    <?php
    while($row=$stmh->fetch(PDO::FETCH_ASSOC)){
    ?>
    <tr>
    <td align="center"><?=htmlspecialchars($row['id'])?></td>
    <td align="center"><?=htmlspecialchars($row['cardID'])?></td>
    <td align="center"><?=htmlspecialchars($row['member'])?></td>
    <td align="center"><?=htmlspecialchars($row['work'])?></td>
    <td align="center"><?=htmlspecialchars($row['info1'])?></td>
    <td align="center"><?=htmlspecialchars($row['info2'])?></td>
    <td align="center"><a href=updataform.php?id=<?=htmlspecialchars($row['id'])?>>更新</td>
    <td align="center"><a href=list.php?action=delete&id=<?=htmlspecialchars($row['id'])?>>削除</td>
    </tr>
    <?php
    }
    ?>
    </tbody></table>

    <?php
    }
    ?>

    </body>
</html>