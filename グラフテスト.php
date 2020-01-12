<html> 
<head>
    <title>ホームページ</title>
    <meta charset=utf-8>
    <link rel="stylesheet" type="text/css" href="tes1.css">
</head>

<body bgcolor="#e0ffff" text="#000000">

<?php 
for($aa=0;$aa<5;$aa++){
$hoge[$aa] = $aa;
}

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
<canvas id="myChart" width="20" height="5"></canvas>

<script type="text/javascript">
var hoge = <?php echo json_encode($hoge); ?>;
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ['A', 'B', 'C', 'D', 'E'],
    datasets: [{
      label: 'apples',
      data: hoge,
      backgroundColor: "rgba(153,255,51,0.4)"
    }]

  }
})
</script>

</body>
</html>


