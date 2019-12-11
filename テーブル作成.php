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
        host=ec2-174-129-255-46.compute-1.amazonaws.com
        dbname=dflv6jh505d9tv
        user=qajdgcrnucpdpx
        password=d2144f11fa2bc512c9f5f4d65cef0b1f804fabef86759d786bd6ca430eba6fa8
        ");
        $newtab="f_".$year."_".$month;
        print $newtab;
        pg_query("CREATE TABLE `". $newtab . "`(
            id CHAR(9) AUTO_INCREMENT NOT NULL,
		    cardID TEXT,
		    member TEXT,
            rane TEXT,
            work TEXT,
            time TEXT,
            year TEXT,
            month TEXT,
            day TEXT,
		    PRIMARY KEY(id)
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
