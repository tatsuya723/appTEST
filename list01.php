<?php session_start();?>
<html>
    <head>
        <title>検索フォーム</title>
        <meta charset=utf-8>
        <link rel="stylesheet" type="text/css" href="tes1.css">
    </head>

    <body>
        <hr size="2" noshade>
        <h2>作業記録</h2>
        <hr size="2" noshade>   
        
        <form name="form1" method="post" action="list0.php">
        名前で検索:<br><input type="text" name="search_key"><br>
       
        日付で検索:<br>
        <select name="year">
        <option value="" selected>----年を選択してください----</option>
        <option value="2019">2019</option>
        <option value="2019">2020</option>
        <option value="2019">2021</option>
        <option value="2019">2022</option>
        <option value="2019">2023</option>
        <option value="2019">2024</option>
        <option value="2019">2025</option>
        <option value="2019">2026</option>
        <option value="2019">2027</option>
        <option value="2019">2028</option>
        <option value="2019">2029</option>
        <option value="2019">2030</option>
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

        try{
        //全データを表示
            $sql="SELECT * FROM work";
            $stmh=$pdo->query($sql);
        
            $count=$stmh->rowCount();
           
        }catch(PDOException $Exception){
            
            print"エラー:".$Exception->getMessage();
        } 
        if($count<1){
            print "検索結果がありません。<br>";
        }else{
        ?>


        <table width="1100" border="1" cellspacing="2" cellpadding="18">
        <tbody>
        <tr><th>番号</th><th>カードID</th><th>氏名</th><th>レーン</th><th>作業時間</th><th>作業内容</th><th>年月日</th><th>&nbsp;</th><th>&nbsp;</th></tr>
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
        <td align="center"><?=htmlspecialchars($row['data'])?></td>
        <td align="center"><a href=updataform2.php?id=<?=htmlspecialchars($row['id'])?>>更新</td>
        <td align="center"><a href=list0.php?action=delete&id=<?=htmlspecialchars($row['id'])?>>削除</td>
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