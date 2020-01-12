<html> 
<head>
    <title>ホームページ</title>
    <meta charset=utf-8>
    <link rel="stylesheet" type="text/css" href="tes1.css">
</head>
<body bgcolor="#e0ffff" text="#000000">

<!--検索ボックス-->
<form name="form1" method="post" action="グラフテスト.php">
       
        <font size="4" color="#000000">名前で検索:</font><br>
        <input type="text" name="search_key"><br> 
        
        <font size="4" color="#000000">作業内容を指定:</font><br>
        <select name="work">
        <option value="" selected>----作業内容を選択してください----</option>
        <option value="収穫">収穫</option>
        <option value="芽かき">芽かき</option>
        <option value="追い巻き">追い巻き</option>
        </select>
        <br>      

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
        日     
        <br>
        <input type="submit" value="検索">
</form>






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
    print "データベース接続失敗<br>";
}
/*▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲
▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲*/
?>



<?php
/*ラベル用に作業員の名前を取得 */
try{
    $stmh=$pdo->query("SELECT * FROM sample_member");
    $stmh->execute();
}catch(PDOException $Exception){
    print "エラー:".$Exception->getMessage();
}

$cc = 0;
$rs = $stmh->fetchall();
//$count = 0;
//$labelに作業員の名前を入れる。
foreach ( $rs as $row ) {
    if($row["work"] == "収穫"){
        $label[$cc] = $row["last_name"];
        $cc += 1;
    }
}
?>




<?php 
/*■■■■■■■■■■■■■■■■■■■
(1)年、月
パターン番号＝11
■■■■■■■■■■■■■■■■■■■■■*/
if($_POST["year"]!="" && $_POST["month"]!=""){

    $tabname="b_".$_POST["year"]."_".$_POST["month"];//テーブル名作成
    $tabsel="SELECT * FROM ".$tabname;//セレクト文作成
    $search_key=$_POST["search_key"];
    //クエリ実行
    try{
    $stmh=$pdo->query($tabsel);
    $stmh->execute();
    }catch(PDOException $Exception){
        print "エラー:"."データテーブルが見つかりません。<br>";
    }
    $rs2 = $stmh->fetchall();
    
    for($aa=0;$aa<count($label);$aa+){
        $time_sum = 0;
        $eff_sum = 0;
        $eff_count = 0;
        foreach($rs2 as $row2){
            if($row2["member"] == $label[$aa]){
                $time = (float) $row2["work_time"];
                $time_sum += $time;//作業時間の合計
                $eff = (float) $row2["eff"];
                $eff_sum += $eff;//作業効率の合計
                $eff_count += 1.0;
            }
        }
        if($eff_sum == 0 || $eff_count == 0){
            $eff_ave = 0;
        }else{
            $eff_ave = ($eff_sum/$eff_count); //作業効率の平均
        }
        $time_arr[$aa] = $time_sum; //scriptに送る作業時間の合計
        $eff_arr[$aa] = $eff_ave;   //scriptに送る作業効率の平均
        print $time_arr[$aa];
        print "<br>";
        print $eff_arr[$aa];
        print "<br>";
    }

?>
<!--
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
<canvas id="time" width="20" height="5"></canvas><br><br>
<canvas id="eff" width="20" height="5"></canvas><br><br>

<script type="text/javascript">
\


var work_time = document.getElementById('time').getContext('2d');
var myChart1 = new Chart(work_time, {
  type: 'bar',
  data: {
    labels: label_member,
    datasets: [{
      label: 'apples',
      data: time_arr,
      backgroundColor: "rgba(153,255,51,0.4)"
    }]
  }
});

var eff_ave = document.getElementById('eff').getContext('2d');
var myChart2 = new Chart(eff_ave, {
  type: 'bar',
  data: {
    labels: label_member,
    datasets: [{
      label: 'apples',
      data: eff_arr,
      backgroundColor: "rgba(153,255,51,0.4)"
    }]
  }
});
</script>
-->
<?php
}
?>

</body>
</html>


