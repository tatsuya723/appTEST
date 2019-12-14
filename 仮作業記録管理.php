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

        <form name="form1" method="post" action="仮作業記録管理.php">
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
        <option value="28">29</option>
        <option value="30">30</option>
        <option value="31">31</option>   
        </select>
        日<br>
        <input type="submit" value="検索">
        </form>

        


    <?php
    
/*▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲
    //DB接続処理。
▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲*/
    require_once("DB接続.php");
    $pdo=db_connect();
    
    
/*▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲
    //削除処理(編集中)
▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲*/
/*    if(isset($_GET['action']) && $_GET['action']=='delete' && $_GET['id']>0 ){
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
*/

/*▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲
    //挿入処理(編集中)
▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲*/
 /*   if(isset($_POST['action']) && $_POST['action']=='insert'){
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
*/


/*▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲
    //更新処理(編集中)
▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲*/
 /*   if(isset($_POST['action']) && $_POST['action']=='update'){
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
*/


/*▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲
    //検索および現在の全データを表示する処理。
▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲*/
    
    try{
    /*●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●          
    名前(orカードID,作業内容)と日付の両方が指定された場合の処理
    ●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●● */
        
        /*■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
        名前＋年月日 指定
        ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■*/       
        if((isset($_POST['search_key']) && $_POST['search_key']!="" && $_POST['year']!="" && $_POST['month']!="" && $_POST['day']!=""){      
                
            $search_key=$_POST["search_key"];                   //検索boxに入力された文字列を変数search_keyに代入
            $tabname="b_".$_POST["year"]."_".$_POST["month"];   //テーブル名を作成
            $tabsql="SELECT * FROM ".$tabname;                  //SELECT文を変数tabsqlに代入
                
            try{
                $stmh=$pdo->query($tabsql);                     //検索条件にあてはまるテーブルの中身を全て取り出す。
                $stmh->execute();                               //クエリ実行
            }catch(PDOException $Exception){
                print "エラー:".$Exception->getMessage();
            }

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
            <tr><th>カードid</th><th>名前</th><th>作業時間[分]</th><th>作業内容</th><th>レーン</th><th>年月日</th><th>時刻</th></tr>

            <?php
            $rs = $stmh->fetchall ();               //変数rsにfetchallで得られた値を連想配列で代入
            foreach ( $rs as $row ) {
                if($row['member']==$search_key && $row['dd']==$KEY23){    //連想配列の要素memberが検索ワードと、要素ddが指定日と一致した場合のみ、表を作成する。
            ?> 
                    <tr>
                    <td align="center"><?=htmlspecialchars($row['card_id'])?></td>
                    <td align="center"><?=htmlspecialchars($row['member'])?></td>
                    <td align="center"><?=htmlspecialchars($row['work_time'])?></td>
                    <td align="center"><?=htmlspecialchars($row['work'])?></td>
                    <td align="center"><?=htmlspecialchars($row['rane'])?></td>
                    <td align="center"><?=htmlspecialchars($row['d_ymd'])?></td>
                    <td align="center"><?=htmlspecialchars($row['dt'])?></td>
                    </tr>
            <?php
                }
            }
            ?>
            </tbody></table>

<?php
        /*■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
        名前＋年月のみ指定
        ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■*/
        }elseif((isset($_POST['search_key']) && $_POST['search_key']!="" && $_POST['year']!="" && $_POST['month']!=""){ 
                
            $search_key=$_POST["search_key"];                   //検索boxに入力された文字列を変数search_keyに代入
            $tabname="b_".$_POST["year"]."_".$_POST["month"];   //テーブル名を作成
            $tabsql="SELECT * FROM ".$tabname;                  //SELECT文を変数tabsqlに代入
                
            try{
                $stmh=$pdo->query($tabsql);                     //検索条件にあてはまるテーブルの中身を全て取り出す。
                $stmh->execute();                               //クエリ実行
            }catch(PDOException $Exception){
                print "エラー:".$Exception->getMessage();
            }

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
            <tr><th>カードid</th><th>名前</th><th>作業時間[分]</th><th>作業内容</th><th>レーン</th><th>年月日</th><th>時刻</th></tr>

            <?php
            $rs = $stmh->fetchall ();               //変数rsにfetchallで得られた値を連想配列で代入
            foreach ( $rs as $row ) {
                if($row['member']==$search_key){    //連想配列の要素memberが検索ワードと一致した場合のみ、表を作成する。
            ?> 
                    <tr>
                    <td align="center"><?=htmlspecialchars($row['card_id'])?></td>
                    <td align="center"><?=htmlspecialchars($row['member'])?></td>
                    <td align="center"><?=htmlspecialchars($row['work_time'])?></td>
                    <td align="center"><?=htmlspecialchars($row['work'])?></td>
                    <td align="center"><?=htmlspecialchars($row['rane'])?></td>
                    <td align="center"><?=htmlspecialchars($row['d_ymd'])?></td>
                    <td align="center"><?=htmlspecialchars($row['dt'])?></td>
                    </tr>
            <?php
                }
            }
            ?>
            </tbody></table>

<?php
        /*■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
        名前＋年のみ指定　
        ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■*/
        }elseif((isset($_POST['search_key']) && $_POST['search_key']!="" && $_POST['year']!=""){ 
            $search_key=$_POST["search_key"];                   //検索boxに入力された文字列を変数search_keyに代入
            $KEY1="13";
            $KEY2="";
            $KEY21=$_POST['year'];
            $KEY22=$_POST['month'];
            $KEY23=$_POST['day'];
?>
            <font size="3" color="#000000">検索ワード：</font>
            <font size="4" color="#ff0000"><?=$KEY2?></font><br>
            <font size="3" color="#000000">指定年月日：</font>
            <font size="4" color="#ff0000"><?=$KEY21?>年<br>

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
            <tr><th>カードid</th><th>名前</th><th>作業時間[分]</th><th>作業内容</th><th>レーン</th><th>年月日</th><th>時刻</th></tr>

            <?php
            for($mm=1;$mm<13;$mm++){                //ループで、1月～12月のテーブルを全て取得
            $tabname="b_".$_POST["year"]."_".$mm;   //テーブル名を作成
            $tabsql="SELECT * FROM ".$tabname;      //SELECT文を変数tabsqlに代入
            
                try{
                    $stmh=$pdo->query($tabsql);     //検索条件にあてはまるテーブルの中身を全て取り出す。
                    $stmh->execute();               //クエリ実行
                }catch(PDOException $Exception){
                    print "エラー:".$Exception->getMessage();
                }
                $rs = $stmh->fetchall ();           //変数rsにfetchallで得られた値を連想配列で代入
                foreach ( $rs as $row ) {
                    if($row['member']==$search_key){   //要素memberと検索ワードが一致すれば、表を作成。
                ?> 
                        <tr>
                        <td align="center"><?=htmlspecialchars($row['card_id'])?></td>
                        <td align="center"><?=htmlspecialchars($row['member'])?></td>
                        <td align="center"><?=htmlspecialchars($row['work_time'])?></td>
                        <td align="center"><?=htmlspecialchars($row['work'])?></td>
                        <td align="center"><?=htmlspecialchars($row['rane'])?></td>
                        <td align="center"><?=htmlspecialchars($row['d_ymd'])?></td>
                        <td align="center"><?=htmlspecialchars($row['dt'])?></td>
                        </tr>
            <?php
                    }
                }    
            }
            ?>
            </tbody></table>

          
<?php
        /*■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
        名前+月のみ指定(無効)
        ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■*/
        }elseif((isset($_POST['search_key']) && $_POST['search_key']!="" && $_POST['month']!=""){       
        print "年を指定してください。<br>";

        /*■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
        名前+日のみ指定(無効)
        ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■*/
        }elseif((isset($_POST['search_key']) && $_POST['search_key']!="" && $_POST['day']!=""){       
        print "年月を指定してください。<br>";

        /*■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
        名前+年日のみ指定(無効)
        ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■*/
        }elseif((isset($_POST['search_key']) && $_POST['search_key']!="" && $_POST['year']!="" && $_POST['day']!=""){       
        print "月を指定してください。<br>";

        /*■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
        名前+月日のみ指定(無効)
        ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■*/
        }elseif((isset($_POST['search_key']) && $_POST['search_key']!="" && $_POST['month']!="" && $_POST['day']!=""){       
        print "年を指定してください。<br>";
 
        /*■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
        名前のみ指定(無効)
        ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■*/
        }elseif(isset($_POST['search_key']) && $_POST['search_key']!=""){       
        print "年月を指定してください。<br>";
        
?>









<?php 
    /*●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●          
    日付のみ指定された場合の処理
    ●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●●*/        
        /*■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
        年月日指定
        ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■*/      
        }elseif($_POST['search_key']=="" && $_POST['year']!="" && $_POST['month']!="" && $_POST['day']!=""){     
                
            $search_key=$_POST["search_key"];                   //検索boxに入力された文字列を変数search_keyに代入
            $tabname="b_".$_POST["year"]."_".$_POST["month"];   //テーブル名を作成
            $tabsql="SELECT * FROM ".$tabname;                  //SELECT文を変数tabsqlに代入
                
            try{
                $stmh=$pdo->query($tabsql);                     //検索条件にあてはまるテーブルの中身を全て取り出す。
                $stmh->execute();                               //クエリ実行
            }catch(PDOException $Exception){
                print "エラー:".$Exception->getMessage();
            }

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
            <tr><th>カードid</th><th>名前</th><th>作業時間[分]</th><th>作業内容</th><th>レーン</th><th>年月日</th><th>時刻</th></tr>

            <?php
            $rs = $stmh->fetchall ();               //変数rsにfetchallで得られた値を連想配列で代入
            foreach ( $rs as $row ) {
                if($row['dd']==$KEY23){    //連想配列の要素ddが指定日と一致した場合のみ、表を作成する。
            ?> 
                    <tr>
                    <td align="center"><?=htmlspecialchars($row['card_id'])?></td>
                    <td align="center"><?=htmlspecialchars($row['member'])?></td>
                    <td align="center"><?=htmlspecialchars($row['work_time'])?></td>
                    <td align="center"><?=htmlspecialchars($row['work'])?></td>
                    <td align="center"><?=htmlspecialchars($row['rane'])?></td>
                    <td align="center"><?=htmlspecialchars($row['d_ymd'])?></td>
                    <td align="center"><?=htmlspecialchars($row['dt'])?></td>
                    </tr>
            <?php
                }
            }
            ?>
            </tbody></table>

<?php         

        /*■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
        年月のみ指定
        ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■*/    
        }elseif($_POST['search_key']=="" && $_POST['year']!="" && $_POST['month']!=""){     
            $search_key=$_POST["search_key"];                   //検索boxに入力された文字列を変数search_keyに代入
            $tabname="b_".$_POST["year"]."_".$_POST["month"];   //テーブル名を作成
            $tabsql="SELECT * FROM ".$tabname;                  //SELECT文を変数tabsqlに代入
                
            try{
                $stmh=$pdo->query($tabsql);                     //検索条件にあてはまるテーブルの中身を全て取り出す。
                $stmh->execute();                               //クエリ実行
            }catch(PDOException $Exception){
                print "エラー:".$Exception->getMessage();
            }

            $KEY1="32";
            $KEY2="";
            $KEY21=$_POST['year'];
            $KEY22=$_POST['month'];
            $KEY23=$_POST['day'];

?>
            <font size="3" color="#000000">検索ワード：</font>
            <font size="4" color="#ff0000"><?=$KEY2?></font><br>
            <font size="3" color="#000000">指定年月日：</font>
            <font size="4" color="#ff0000"><?=$KEY21?>年<?=$KEY22?>月<br>

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
            <tr><th>カードid</th><th>名前</th><th>作業時間[分]</th><th>作業内容</th><th>レーン</th><th>年月日</th><th>時刻</th></tr>

            <?php
            $rs = $stmh->fetchall ();               //変数rsにfetchallで得られた値を連想配列で代入
            foreach ( $rs as $row ) {
                    //連想配列の中身全てを使って表を作成する。
            ?> 
                    <tr>
                    <td align="center"><?=htmlspecialchars($row['card_id'])?></td>
                    <td align="center"><?=htmlspecialchars($row['member'])?></td>
                    <td align="center"><?=htmlspecialchars($row['work_time'])?></td>
                    <td align="center"><?=htmlspecialchars($row['work'])?></td>
                    <td align="center"><?=htmlspecialchars($row['rane'])?></td>
                    <td align="center"><?=htmlspecialchars($row['d_ymd'])?></td>
                    <td align="center"><?=htmlspecialchars($row['dt'])?></td>
                    </tr>
            <?php
                
            }
            ?>
            </tbody></table>

<?php
        /*■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
        年のみ指定
        ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■*/
        }elseif($_POST['search_key']=="" && $_POST['year']!=""){ 
            $search_key=$_POST["search_key"];                   //検索boxに入力された文字列を変数search_keyに代入
            $KEY1="33";
            $KEY2="";
            $KEY21=$_POST['year'];
            $KEY22=$_POST['month'];
            $KEY23=$_POST['day'];
?>
            <font size="3" color="#000000">検索ワード：</font>
            <font size="4" color="#ff0000"><?=$KEY2?></font><br>
            <font size="3" color="#000000">指定年月日：</font>
            <font size="4" color="#ff0000"><?=$KEY21?>年<br>

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
            <tr><th>カードid</th><th>名前</th><th>作業時間[分]</th><th>作業内容</th><th>レーン</th><th>年月日</th><th>時刻</th></tr>

            <?php
            for($mm=1;$mm<13;$mm++){                //ループで、1月～12月のテーブルを全て取得
            $tabname="b_".$_POST["year"]."_".$mm;   //テーブル名を作成
            $tabsql="SELECT * FROM ".$tabname;      //SELECT文を変数tabsqlに代入
            
                try{
                    $stmh=$pdo->query($tabsql);     //検索条件にあてはまるテーブルの中身を全て取り出す。
                    $stmh->execute();               //クエリ実行
                }catch(PDOException $Exception){
                    print "エラー:".$Exception->getMessage();
                }
                $rs = $stmh->fetchall ();           //変数rsにfetchallで得られた値を連想配列で代入
                foreach ( $rs as $row ) {
                        //連想配列の中身全てを使って表を作成する。
                ?> 
                        <tr>
                        <td align="center"><?=htmlspecialchars($row['card_id'])?></td>
                        <td align="center"><?=htmlspecialchars($row['member'])?></td>
                        <td align="center"><?=htmlspecialchars($row['work_time'])?></td>
                        <td align="center"><?=htmlspecialchars($row['work'])?></td>
                        <td align="center"><?=htmlspecialchars($row['rane'])?></td>
                        <td align="center"><?=htmlspecialchars($row['d_ymd'])?></td>
                        <td align="center"><?=htmlspecialchars($row['dt'])?></td>
                        </tr>
            <?php
                }    
            }
            ?>
            </tbody></table>


<?php            
        /*■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
        月のみ指定(無効)
        ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■*/
        }elseif($_POST['search_key']=="" && $_POST['month']!=""){       
        print "年を指定してください。<br>";

        /*■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
        日のみ指定(無効)
        ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■*/
        }elseif($_POST['search_key']=="" && $_POST['day']!=""){       
        print "年月を指定してください。<br>";

        /*■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
        年日のみ指定(無効)
        ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■*/
        }elseif($_POST['search_key']=="" && $_POST['year']!="" && $_POST['day']!=""){       
        print "月を指定してください。<br>";

        /*■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
        月日のみ指定(無効)
        ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■*/
        }elseif($_POST['search_key']=="" && $_POST['month']!="" && $_POST['day']!=""){       
        print "年を指定してください。<br>";        
?>

<?php
        /*■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
        何も指定がないとき(＝今月の記録を表示)
        ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■*/
        }else{        
            $T=time();
            $Y=date('Y',$T);
            $M=date('m',$T);
            
            $KEY1="4"; 
            $KEY2="";  
            $KEY21=$Y;
            $KEY22=$M;
            $KEY23="";     
            
            $tabname="b_".$Y."_".$M;                            //テーブル名を作成
            $tabsql="SELECT * FROM ".$tabname;                  //SELECT文を変数tabsqlに代入
            try{
                $stmh=$pdo->query($tabsql);
                $stmh->execute();                               //クエリ実行
            }catch(PDOException $Exception){
                print "エラー:".$Exception->getMessage();
            }

?>

            <font size="4" color="#ff0000">今月の記録</font><br>

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
            <tr><th>カードid</th><th>名前</th><th>作業時間[分]</th><th>作業内容</th><th>レーン</th><th>年月日</th><th>時刻</th></tr>
            <?php
            $rs = $stmh->fetchall ();               //変数rsにfetchallで得られた値を連想配列で代入
            foreach ( $rs as $row ) {
                    //連想配列の中身全てを使って表を作成する。
            ?> 
                    <tr>
                    <td align="center"><?=htmlspecialchars($row['card_id'])?></td>
                    <td align="center"><?=htmlspecialchars($row['member'])?></td>
                    <td align="center"><?=htmlspecialchars($row['work_time'])?></td>
                    <td align="center"><?=htmlspecialchars($row['work'])?></td>
                    <td align="center"><?=htmlspecialchars($row['rane'])?></td>
                    <td align="center"><?=htmlspecialchars($row['d_ymd'])?></td>
                    <td align="center"><?=htmlspecialchars($row['dt'])?></td>
                    </tr>
            <?php
                
            }
            ?>
            </tbody></table>

<?php           
        }

    }catch(PDOException $Exception){
            print"エラー:".$Exception->getMessage();
    } 

?>
    </body>
</html>