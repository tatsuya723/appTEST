<html> 
<head>
    <title>グラフを表示するページ</title>
    <meta charset=utf-8>
    <link rel="stylesheet" type="text/css" href="tes1.css">
    <script type="text/javascript">
    $(function(){	
    console.log(graph);
    });
    </script>
</head>

<body>

<form name="form1" method="post" action="グラフページ.php">
       
        <!--<font size="4" color="#000000">名前を指定:</font><br>
        <input type="text" name="search_key"><br>       
-->
        <font size="4" color="#000000">日付を指定:</font><br>
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
$i=0;

if($_POST["year"]!="" && $_POST["month"]!="" ){

?>
    <font size="3" color="#000000">指定年月：</font>
    <font size="4" color="#ff0000"><?=$_POST["year"]?>年<?=$_POST["month"]?>月</font><br>
<?php
    $tabname="b_".$_POST["year"]."_".$_POST["month"];//テーブル名作成
    $tabsel="SELECT * FROM ".$tabname;//セレクト文作成

    //sample_memberから作業員全員の名前を取得して配列に保存する。
    try{
    $stmh1=$pdo->query("SELECT * FROM sample_member WHERE work='収穫'");
    $stmh1->execute();
    }catch(PDOException $Exception){
        print "エラー:"."データテーブルが見つかりません。<br>";
    }
    $rs1 = $stmh1->fetchall();
    foreach ( $rs1 as $row1 ) { //1ループ、1人

        //使用する変数の初期化
        $eff = 0;
        $eff_sum = 0;
        $eff_count = 0;
        $worktime_sum = 0;

        //指定されたテーブルの作業記録を全て取得する。
        try{
            $stmh2=$pdo->query($tabsel);
            $stmh2->execute();
        }catch(PDOException $Exception){
            print "エラー:"."データテーブルが見つかりません。<br>";
        }
        $rs2 = $stmh2->fetchall();
        foreach ( $rs2 as $row2 ){  //1ループ、1データ
            //sample_memberから取得した名前と作業記録の名前が一致した場合、行う処理。
            if( $row1['member'] == $row2['member'] ){
                $eff_sum += $row2['eff'];
                $eff_count += 1;
                $worktime_sum += $row2['work_time'];
            }
        }
        
        $eff = ($eff_sum/$eff_count);           //効率の平均値計算
        $graph[$i]["member"=>$row1['member'] , "work_time"=>$worktime_sum , "eff"=>$eff];     //配列に保存
        $i++;

        //これで1ループの処理は終了。次の作業員の処理へ。
-
    }

//JavaScriptへphp変数をJSONで渡すための処理
$php_json = json_encode( $graph );
print $graph['eff']."<br>";
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
<canvas id="myChart" width="20" height="5"></canvas>

<script type="text/javascript">
//phpから変数を受け取る。
var graph = JSON.parse('<?php echo $php_json; ?>');

var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
type: 'bar',
data: {
    labels: graph['member'],
    datasets: [{
        label: '作業効率',
        data: graph['eff'],
        backgroundColor: "rgba(153,255,51,0.4)"
    }
});
</script>

<?php
}
?>
</body>
</html>