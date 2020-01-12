<html> 
<head>
    <title>うんこ</title>
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
$DAY = (string) $_POST["day"];
/*■■■■■■■■■■■■■■■■■■■
(1)年、月
パターン番号＝11
■■■■■■■■■■■■■■■■■■■■■*/
for($aa=0;$aa<5;$aa++){
$ARRtes[$aa]=$aa;
}
?>

<!--
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
<canvas id="time" width="20" height="5"></canvas><br><br>
<canvas id="eff" width="20" height="5"></canvas><br><br>

<script type="text/javascript">



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


</body>
</html>


