<?php session_start();?>
<html>
    <head>
        <title>作業記録を表示するページ</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="tes1.css">
    </head>
    <body bgcolor="#e0ffff" text="#000000">
        <a href="main.html">ホームページへ</a><br>
        <hr size="2" noshade>
        <h2>作業記録管理</h2>
        <hr size="2" noshade>   
        
        <p>
        ・検索は氏名,カードID,作業内容のいずれかで行えます。※未入力の場合は今月の記録を全て表示。<br>
        ・年月日指定をする場合、年は必ず入力してください。<br>
        　○年のみ指定、○年月のみ指定　　×月日のみ指定、×日のみ指定</p><br>

        <form name="form1" method="post" action="作業記録管理.php">
        <font size="4" color="#000000">名前で検索:</font><br>
        <input type="text" name="search_key"><br>
       
        <font size="4" color="#000000">日付で検索:</font><br>
        <select name="year">
        <option value="" selected>----年を選択してください----</option>
        <option value="2019">2019</option>
        <option value="2020">2020</option>
        <option value="2021">2021</option>
        <option value="2022">2022</option>
        <option value="2023">2023</option>
        <option value="2024">2024</option>
        <option value="2025">2025</option>
        <option value="2026">2026</option>
        <option value="2027">2027</option>
        <option value="2028">2028</option>
        <option value="2029">2029</option>
        <option value="2030">2030</option>
        </select>
        年
        <select name="month">
        <option value="" selected>----月を選択してください----</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        </select>
        月
        <select name="day">
        <option value="" selected>----日を選択してください----</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
        </select>
        日<br>
        <input type="submit" value="検索">
        </form>



    <?php
    
    require_once("MYDB.php");
    $pdo=db_connect();

    //削除処理
    if(isset($_GET['action']) && $_GET['action']=='delete' && $_GET['id']>0 ){
        try{
            $pdo->beginTransaction();
            $id=$_GET['id'];
            $sql="DELETE FROM work WHERE id=:id";
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
            $sql="INSERT INTO work(cardID,member,rane,time,work,data)VALUES(:cardID,:member,:rane,:time,:work,:data)";
            $stmh=$pdo->prepare($sql);
            $stmh->bindValue(':cardID',$_POST['cardID'],PDO::PARAM_STR);
            $stmh->bindValue(':member',$_POST['member'],PDO::PARAM_STR);
            $stmh->bindValue(':rane',$_POST['rane'],PDO::PARAM_STR);
            $stmh->bindvalue(':time',$_POST['time'],PDO::PARAM_STR);
            $stmh->bindvalue(':work',$_POST['work'],PDO::PARAM_STR);
            $stmh->bindValue(':data',$_POST['data'],PDO::PARAM_STR);
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
            $sql="UPDATE work 
                SET
                cardID = :cardID,
                member = :member,
                rane   = :rane,
                time  = :time,
                work  = :work,
                data  = :data;
                WHERE id = :id";
        
            $stmh=$pdo->prepare($sql);
            $stmh->bindValue(':cardID',$_POST['cardID'],PDO::PARAM_STR);
            $stmh->bindValue(':member',$_POST['member'],PDO::PARAM_STR);
            $stmh->bindValue(':rane',$_POST['rane'],PDO::PARAM_STR);
            $stmh->bindvalue(':time',$_POST['time'],PDO::PARAM_STR);
            $stmh->bindvalue(':work',$_POST['work'],PDO::PARAM_STR);
            $stmh->bindValue(':data',$_POST['data'],PDO::PARAM_STR);
            $stmh->bindValue(':id',$id,PDO::PARAM_INT);
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

        //名前(orカードID,作業内容)と日付の両方が指定された場合の処理
        if((isset($_POST['search_key']) && $_POST['search_key']!="" && $_POST['year']!="" && $_POST['month']!="" && $_POST['day']!="")
          || (isset($_POST['search_key']) && $_POST['search_key']!="" && $_POST['year']!="" && $_POST['month']!="")
          || (isset($_POST['search_key']) && $_POST['search_key']!="" && $_POST['year']!="")){ 

            if($_POST['day']!="" && $_POST['month']!=""){ //年月日すべて指定
                $search_key='%'. $_POST['search_key'].'%';
                $D=$_POST['year'].$_POST['month'].$_POST['day'];//年月日の結合させた変数。
                $YM=$_POST['year'].$_POST['month']
                
                $sql="SELECT * FROM work2 WHERE ( cardID like :cardID OR member like :member OR work like :work ) AND ( year = :year AND month = :month AND day = :day )";
                $stmh=$pdo->prepare($sql);
                $stmh->bindValue(':cardID',$search_key,PDO::PARAM_STR);
                $stmh->bindValue(':member',$search_key,PDO::PARAM_STR);
                $stmh->bindValue(':work',$search_key,PDO::PARAM_STR);
                $stmh->bindValue(':year',$_POST['year'],PDO::PARAM_STR);
                $stmh->bindValue(':month',$_POST['month'],PDO::PARAM_STR);
                $stmh->bindValue(':day',$_POST['day'],PDO::PARAM_STR);
                $stmh->execute();
                $KEY1="11";
                $KEY2=$_POST['search_key'];
                $KEY21=$_POST['year'];
                $KEY22=$_POST['month'];
                $KEY23=$_POST['day'];
?>
                <font size="3" color="#000000">検索ワード：</font>
                <font size="4" color="#ff0000"><?=$KEY2?></font><br>
                <font size="3" color="#000000">指定年月日：</font>
                <font size="4" color="#ff0000"><?=$KEY21?>年<?=$KEY22?>月<?=$KEY23?>日</font><br>
<?php

            }elseif($_POST['month']!=""){ //年月のみ指定
                $search_key='%'. $_POST['search_key'].'%';
                //$D=$_POST['year']."/".$_POST['month']."/".$_POST['day'];
                $sql="SELECT * FROM work2 WHERE ( cardID like :cardID OR member like :member OR work like :work ) AND ( year = :year AND month = :month )";
                $stmh=$pdo->prepare($sql);
                $stmh->bindValue(':cardID',$search_key,PDO::PARAM_STR);
                $stmh->bindValue(':member',$search_key,PDO::PARAM_STR);
                $stmh->bindValue(':work',$search_key,PDO::PARAM_STR);
                $stmh->bindValue(':year',$_POST['year'],PDO::PARAM_STR);
                $stmh->bindValue(':month',$_POST['month'],PDO::PARAM_STR);
                $stmh->execute();
                $KEY1="12";
                $KEY2=$_POST['search_key'];
                $KEY21=$_POST['year'];
                $KEY22=$_POST['month'];
                $KEY23="";

?>
                <font size="3" color="#000000">検索ワード：</font>
                <font size="4" color="#ff0000"><?=$KEY2?></font><br>
                <font size="3" color="#000000">指定年月日：</font>
                <font size="4" color="#ff0000"><?=$KEY21?>年<?=$KEY22?>月</font><br>
<?php


            }else{ //年のみ指定
                $search_key='%'. $_POST['search_key'].'%';
                //$D=$_POST['year']."/".$_POST['month']."/".$_POST['day'];
                $sql="SELECT * FROM work2 WHERE ( cardID like :cardID OR member like :member OR work like :work ) AND ( year = :year )";
                $stmh=$pdo->prepare($sql);
                $stmh->bindValue(':cardID',$search_key,PDO::PARAM_STR);
                $stmh->bindValue(':member',$search_key,PDO::PARAM_STR);
                $stmh->bindValue(':work',$search_key,PDO::PARAM_STR);
                $stmh->bindValue(':year',$_POST['year'],PDO::PARAM_STR);
                $stmh->execute();
                $KEY1="13";
                $KEY2=$_POST['search_key'];
                $KEY21=$_POST['year'];
                $KEY22="";
                $KEY23="";     
            
?>
            <font size="3" color="#000000">検索ワード：</font>
            <font size="4" color="#ff0000"><?=$KEY2?></font><br>
            <font size="3" color="#000000">指定年月日：</font>
            <font size="4" color="#ff0000"><?=$KEY21?>年</font><br>
<?php           }          

        //名前(orカードID,作業内容)のみ指定された場合の処理
        }elseif(isset($_POST['search_key']) && $_POST['search_key']!=""){       
            $search_key='%'. $_POST['search_key'].'%';
            $sql="SELECT * FROM work2 WHERE cardID like :cardID OR member like :member OR work like :work ";
            $stmh=$pdo->prepare($sql);
            $stmh->bindValue(':cardID',$search_key,PDO::PARAM_STR);
            $stmh->bindValue(':member',$search_key,PDO::PARAM_STR);
            $stmh->bindValue(':work',$search_key,PDO::PARAM_STR);
            $stmh->execute();
            $KEY1="2";
            $KEY2=$_POST['search_key'];
            $KEY21="";
            $KEY22="";
            $KEY23="";

?>
            <font size="3" color="#000000">検索ワード：</font>
            <font size="4" color="#ff0000"><?=$KEY2?></font><br>
            <font size="3" color="#000000">指定年月日：</font>
            <font size="4" color="#ff0000">.</font><br>
<?php 
            
    
        //年月日すべて指定された場合の処理      
        }elseif($_POST['search_key']=="" && $_POST['year']!="" && $_POST['month']!="" && $_POST['day']!=""){     
            //$D=$_POST['year']."-".$_POST['month']."-".$_POST['day'];    
            $sql="SELECT * FROM work2 WHERE year = :year AND month = :month AND day = :day";
            $stmh=$pdo->prepare($sql);
            $stmh->bindValue(':year',$_POST['year'],PDO::PARAM_STR);
            $stmh->bindValue(':month',$_POST['month'],PDO::PARAM_STR);
            $stmh->bindValue(':day',$_POST['day'],PDO::PARAM_STR);
            $stmh->execute();
            $KEY1="31";
            $KEY2="";
            $KEY21=$_POST['year'];
            $KEY22=$_POST['month'];
            $KEY23=$_POST['day'];

?>
            <font size="3" color="#000000">検索ワード：</font>
            <font size="4" color="#ff0000"><?=$KEY2?></font><br>
            <font size="3" color="#000000">指定年月日：</font>
            <font size="4" color="#ff0000"><?=$KEY21?>年<?=$KEY22?>月<?=$KEY23?>日</font><br>
<?php         

        //年月のみ指定された場合の処理    
        }elseif($_POST['search_key']=="" && $_POST['year']!="" && $_POST['month']!=""){     
            //$D=$_POST['year']."-".$_POST['month']."-".$_POST['day'];    
            $sql="SELECT * FROM work2 WHERE year = :year AND month = :month";
            $stmh=$pdo->prepare($sql);
            $stmh->bindValue(':year',$_POST['year'],PDO::PARAM_STR);
            $stmh->bindValue(':month',$_POST['month'],PDO::PARAM_STR);
            $stmh->execute();
            $KEY1="32";
            $KEY2="";
            $KEY21=$_POST['year'];
            $KEY22=$_POST['month'];
            $KEY23=""; 

?>
            <font size="3" color="#000000">検索ワード：</font>
            <font size="4" color="#ff0000"><?=$KEY2?></font><br>           
            <font size="3" color="#000000">指定年月日：</font>
            <font size="4" color="#ff0000"><?=$KEY21?>年<?=$KEY22?>月</font><br>
<?php
            
            
        //年のみ指定された場合の処理    
        }elseif($_POST['search_key']=="" && $_POST['year']!=""){     
            //$D=$_POST['year']."-".$_POST['month']."-".$_POST['day'];    
            $sql="SELECT * FROM work2 WHERE year = :year";
            $stmh=$pdo->prepare($sql);
            $stmh->bindValue(':year',$_POST['year'],PDO::PARAM_STR);
            $stmh->execute();
            $KEY1="33";
            $KEY2="";
            $KEY21=$_POST['year'];
            $KEY22="";
            $KEY23=""; 

?>
            <font size="3" color="#000000">検索ワード：</font>
            <font size="4" color="#ff0000"><?=$KEY2?></font><br>
            <font size="3" color="#000000">指定年月日：</font>
            <font size="4" color="#ff0000"><?=$KEY21?>年</font><br>
<?php
        
        //何も指定されなかった場合の処理(=今月の記録を表示する)
        }else{        
            $T=time();
            $Y=date('Y',$T);
            $M=date('m',$T);

            $sql="SELECT * FROM work2 WHERE year = :year AND month = :month";
            $stmh=$pdo->prepare($sql);
            $stmh->bindValue(':year',$Y,PDO::PARAM_STR);
            $stmh->bindValue(':month',$M,PDO::PARAM_STR);
            $stmh->execute();
            $KEY1="4"; 
            $KEY2="";  
            $KEY21=$Y;
            $KEY22=$M;
            $KEY23="";
            print "今月[".$M."月]の記録<br>";
             
        }
        $count=$stmh->rowCount();
        //print"検索結果は" .$count."件です。<br>";
    }catch(PDOException $Exception){
        
        print"エラー:".$Exception->getMessage();
    } 
    

    if($count<1){
        print "検索結果がありません。<br>";
    }else{
        ?>
    
    <form name="formcsv" method="post" action="記録CSV処理.php">
        <input type="hidden" name="key1" value="<?=$KEY1?>">
        <input type="hidden" name="key2" value="<?=$KEY2?>">
        <input type="hidden" name="key21" value="<?=$KEY21?>">
        <input type="hidden" name="key22" value="<?=$KEY22?>">
        <input type="hidden" name="key23" value="<?=$KEY23?>">
        <input type="submit" value="CSVファイルダウンロード">
    </form>

   

    <table width="1100" border="1" cellspacing="2" cellpadding="18">
    <tbody>
    <tr><th>番号</th><th>カードID</th><th>氏名</th><th>レーン</th><th>作業時間(分)</th><th>作業内容</th><th>年</th><th>月</th><th>日</th><th>&nbsp;</th><th>&nbsp;</th></tr>
    <?php
    while($row=$stmh->fetch(PDO::FETCH_ASSOC)){
    ?>
    <tr>
    <td align="center"><?=htmlspecialchars($row['id'])?></td>
    <td align="center"><?=htmlspecialchars($row['cardID'])?></td>
    <td align="center"><?=htmlspecialchars($row['member'])?></td>
    <td align="center"><?=htmlspecialchars($row['rane'])?></td>
    <td align="center"><?=htmlspecialchars($row['time'])?></td>
    <td align="center"><?=htmlspecialchars($row['work'])?></td>
    <td align="center"><?=htmlspecialchars($row['year'])?></td>
    <td align="center"><?=htmlspecialchars($row['month'])?></td>
    <td align="center"><?=htmlspecialchars($row['day'])?></td>
    <td align="center"><a href=updataform.php?id=<?=htmlspecialchars($row['id'])?>>編集</td>
    <td align="center"><a href=list01.php?action=delete&id=<?=htmlspecialchars($row['id'])?>>削除</td>
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