<html> 
<head>
    <title>ホームページ</title>
    <meta charset=utf-8>
    <link rel="stylesheet" type="text/css" href="tes1.css">
</head>
<body bgcolor="#e0ffff" text="#000000">

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

<h4>今月の記録</h4>
<h4>2020年1月</h4><br>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
<canvas id="作業時間合計" width="20" height="5"></canvas><br><br>

<script type="text/javascript">
var member = <?php echo json_encode($hoge); ?>;
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
</body>
</html>