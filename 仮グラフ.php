<html> 
<head>
    <title>ホームページ</title>
    <meta charset=utf-8>
    <link rel="stylesheet" type="text/css" href="tes1.css">
</head>
<body bgcolor="#e0ffff" text="#000000">

<hr size="10" noshade>
<h1>#作業記録ページ</h1>
<hr size="10" noshade>
<a href="index.php">ホームページへ</a><br>
<a href="作業記録.php"><font size="5">戻る</font></a><br>
<?php
$MEMBER[0]="島井";
$MEMBER[1]="都築";
$MEMBER[2]="西本";
$MEMBER[3]="濱田";
$MEMBER[4]="広瀬";
$MEMBER[5]="吉川";
$MEMBER[6]="土居";
$MEMBER[7]="山中";

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

//sample_memberから取得
try{
  $stmh=$pdo->query("SELECT * FROM sample_member");
  $stmh->execute();
}catch(PDOException $Exception){
  print "エラー:"."データテーブルが見つかりません。<br>";
}
$sample_member = $stmh->fetchall ();
foreach ( $sample_member as $member_b ) {
  if($member_b["work"] == "収穫"){
    $member[] = $member_b["収穫"];
  }  

}
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>

<hr size="5" noshade>
<hr size="5" noshade>
<hr size="5" noshade>
<hr size="5" noshade>
<hr size="5" noshade>
<hr size="5" noshade>
<h2 color="#ffa500">作業時間の合計</h2>
<hr size="5" noshade>
<font size="4" color="#ff0000">2020年1月</font><br>
<canvas id="作業時間合計" width="20" height="5"></canvas><br><br>
<br><br><br><br><br><br><br><br><br><br><br>
<hr size="5" noshade>
<hr size="5" noshade>
<hr size="5" noshade>
<hr size="5" noshade>
<hr size="5" noshade>
<hr size="5" noshade>
<h2 color="#ffa500">平均作業効率</h2>
<hr size="5" noshade>
<font size="4" color="#ff0000">2020年1月</font><br>
<canvas id="平均作業効率" width="20" height="5"></canvas><br><br>

<script type="text/javascript">
var member = <?php echo json_encode($member); ?>;
var work_time = document.getElementById('作業時間合計').getContext('2d');
var myChart1 = new Chart(work_time, {
    type: 'bar',
    data: {
        labels: member,
        datasets: [{
        label: '作業時間合計',
        data: [5020,5210,4873,5288,5110,5107,4556,5622],
        backgroundColor: "rgba(20,255,0,0.9)"
        
        }]
    }   
});

var work_time2 = document.getElementById('平均作業効率').getContext('2d');
var myChart1 = new Chart(work_time2, {
  type: 'bar',
  data: {
    labels: member,
    datasets: [{
      label: '平均作業効率',
      data: [84,81,77,92,77,88,79,82],
      backgroundColor: "rgba(20,255,0,0.9)"
    }]
  }
});


</script>
</body>
</html>