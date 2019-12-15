<html>
<head>
<title>SELECT構文(PHP内)テスト</title>
<meta charset=utf-8>
</head>
<body>

<form name="form1" method="post" action="select文のテスト.php">
       
        <font size="4" color="#000000">名前で検索:</font><br>
        <input type="text" name="search_key"><br>

        <font size="4" color="#000000">年月でテーブルを指定する:</font><br>
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
        日     
        <br>
        <input type="submit" value="検索">
</form>

<?php

if($_POST["search_key"]!="" && $_POST["year"]!="" && $_POST["month"]!=""){

require_once("DB接続.php")
$pdo=db_connect();
/*
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
    print"接続しました<br>";
}catch(PDOException $Exception){
    die('エラー:'.$Exception->getMessage());
}
*/

$tabname="b_".$_POST["year"]."_".$_POST["month"];//テーブル名作成
$tabsel="SELECT * FROM ".$tabname;//セレクト文作成
$search_key=$_POST["search_key"];
$tabsel;

try{
$stmh=$pdo->query($tabsel);

$stmh->execute();
}catch(PDOException $Exception){
    print "エラー:".$Exception->getMessage();
}


//if(!$result){
  //  die('クエリが失敗しました。'.pg_last_error());
//}
?>

<table width="1100" border="1" cellspacing="2" cellpadding="18">
<tbody>
<tr><th>カードid</th><th>名前</th><th>作業時間[分]</th><th>作業内容</th><th>レーン</th><th>年月日</th><th>時刻</th></tr>

<?php
/*for ($i = 0 ; $i < pg_num_rows($) ; $i++){
$row = pg_fetch_array($result, NULL, PGSQL_ASSOC);
*/
//while($row=$stmh->fetch(PDO::FETCH_ASSOC)){
$rs = $stmh->fetchall ();
foreach ( $rs as $row ) {
//        echo "id：" . $row ["id"] . " name:" . $row [1] . "<br />\r\n";

    if($row['member']==$search_key){
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

<?
    }
}

}
?>

</body>
</html>