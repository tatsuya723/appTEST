<html>
<head>
<title>aa</title>
<meta charset=utf-8>
</head>
<body>
<form name="form1" method="post" action="テーブル作成.php">
<input type="hidden" name="ABCD" value="ABCD">
<input type="submit" value="作成"><br>
</form>
<a href="index.php">戻る</a><br>
<?php

//require_once("MYDB.php");     
//$pdo=db_connect();

if(isset($_POST["ABCD"])){
    
    //今日の日付
    $T=time();
    $year=date('Y',$T);
    $month=date('m',$T);
    $day=date('d',$T);
    $tim=date('His',$T);
    
    //1日前
    $timecheck=time()-(60*60*24);
    $yday_Y=date('Y',$timecheck);
    $yday_m=date('m',$timecheck);
    $yday_d=date('d',$timecheck);
    $TWW=date('Ymd',$timecheck);
    print $TWW."<br>";
//日にちが１かつ時刻が0時0分0秒のとき実行-==>レンタルサーバのcronを使って自動実行する。
//if($day=="01" && $tim=="000000"){
            /*id(50) AUTO_INCREMENT PRIMARY KEY,
            cardID varchar(50),
            member varchar(50),
            rane varchar(50),
            time varchar(50),
            work varchar(50),
            year varchar(50),
            month varchar(50),
            day varchar(50),
            registry_datetime DATETIME    
*/

    //前日と月が異なる場合
    //if($month!=$yday_m){
    //try{   
        //$dbh = new PDO("mysql:host=localhost; dbname=tes;", 'tatsuya', 'slkmb');
        $dbh = pg_connect("
        host=ec2-174-129-255-37.compute-1.amazonaws.com 
        dbname=d5v6is7df4kfu2 
        user=aqhcspiasvixkn 
        password=82c25b626c5bc385254210b149f906f8d0f6927c0b2b5305768c0f8b0a452b54
        ");
        $newtab="f_".$year."_".$month;
        print $newtab;
        pg_query("CREATE TABLE `". $newtab . "`(
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
		    cardID VARCHAR(20),
		    member VARCHAR(20),
            rane VARCHAR(20),
            work VARCHAR(20),
            time VARCHAR(20),
            year VARCHAR(20),
            month VARCHAR(20),
            day VARCHAR(20),
		    registry_datetime DATETIME
            ) ");

        pg_close($dbh);
            
        //SQL実行
        //$res = $dbh->pg_query($sql);
        //}catch(PDOException $e) {
           // echo $e->getMessage();
            //die();
        //}
    //}
    
//}

}
?>

</body>
</html>
