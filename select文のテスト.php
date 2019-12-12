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
        <br>
        <input type="submit" value="検索">
        </form>

<?php

if($_POST["search_key"]!="" && $_POST["year"]!="" && $_POST["month"]!=""){


$dbh = pg_connect("
host=ec2-174-129-255-46.compute-1.amazonaws.com
dbname=dflv6jh505d9tv
user=qajdgcrnucpdpx
port=5432
password=d2144f11fa2bc512c9f5f4d65cef0b1f804fabef86759d786bd6ca430eba6fa8
");

$tabname="a_".$_POST["year"]."_".$_POST["month"];
$search_key = $_POST["search_key"];
print $tabname;
//$result=pg_query("SELECT * FROM `". $tabname ."` WHERE(name like :name OR age like :age)");
$result=pg_query("SELECT * FROM a_2019_11 WHERE(name = :name OR age = :age)");
$stmh=$dbh->prepare($sql);
$stmh->bindValue(':name',$search_key,PDO::PARAM_STR);
$stmh->bindValue(':age',$search_key,PDO::PARAM_STR);
$stmh->execute();

if(!$result){
    die('クエリが失敗しました。'.pg_last_error());
}
?>

<table width="1100" border="1" cellspacing="2" cellpadding="18">
<tbody>
<tr><th>id</th><th>名前</th><th>年齢</th></tr>

<?php
for ($i = 0 ; $i < pg_num_rows($result) ; $i++){
$row = pg_fetch_array($result, NULL, PGSQL_ASSOC);
?> 

<tr>
<td align="center"><?=htmlspecialchars($row['id'])?></td>
<td align="center"><?=htmlspecialchars($row['name'])?></td>
<td align="center"><?=htmlspecialchars($row['age'])?></td>
</tr>

<?
}

}
?>

</body>
</html>