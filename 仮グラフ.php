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

<?php
$MEMBER[0]="島井";
$MEMBER[1]="都築";
$MEMBER[2]="西本";
$MEMBER[3]="濱田";
$MEMBER[4]="広瀬";
$MEMBER[5]="吉川";
$MEMBER[6]="土居";
$MEMBER[7]="山中";
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
var member = <?php echo json_encode($MEMBER); ?>;
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