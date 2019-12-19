<?php
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=GRAYCODE.csv");
header("Content-Transfer-Encoding: binary");

//require_once("DB接続処理.php");
//$pdo = db_connect();

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
    die("エラー:".$Exception->getMessage());}
/*▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲
▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲*/




//key1:処理区別番号
//key21:名前
//key31:年
//key32:月
//key33:日
$key21=$_POST['key21'];
$Y=$_POST['key31'];
$M=$_POST['key32'];
$D=$_POST['key33'];

//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーー指定：[名前、年、月、日]ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
if($_POST['key1']=="11"){
	$tabname="b_".$Y."_".$M;
    $tabsel="SELECT * FROM ".$tabname;
    try{
    $stmh=$pdo->query($tabsel);
    $stmh->execute();
    }catch(PDOException $Exception){
        print "エラー:".$Exception->getMessage();
    }
	$rs = $stmh->fetchall ();
	
	$csv = '"","カードID","氏名","作業時間[分]","作業内容","レーン","年月日","時刻"' . "\n";
	
	for($i=0;$i<count($rs);$i++){
		if(($rs[$i]['member'] == $key21) && ($rs[$i]['dd'] == $D)){
		$csv .= "".",". $rs[$i]['card_id']  .",".  $rs[$i]['member'] .",".  $rs[$i]['work_time'] .",". $rs[$i]['work'] .",". $rs[$i]['rane'].",". $rs[$i]['d_ymd'].",".$rs[$i]['dt']. "\n";	
		}
	}

//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーー指定：[名前、年、月]ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
}elseif($_POST['key1']=="12"){
	$tabname="b_".$Y."_".$M;
    $tabsel="SELECT * FROM ".$tabname;
    try{
    $stmh=$pdo->query($tabsel);
    $stmh->execute();
    }catch(PDOException $Exception){
        print "エラー:".$Exception->getMessage();
    }
	$rs = $stmh->fetchall ();
	
	$csv = '"","カードID","氏名","作業時間[分]","作業内容","レーン","年月日","時刻"' . "\n";
	
	for($i=0;$i<count($rs);$i++){
		if($rs[$i]['member'] == $key21){
			$csv .= "".",". $rs[$i]['card_id']  .",".  $rs[$i]['member'] .",".  $rs[$i]['work_time'] .",". $rs[$i]['work'] .",". $rs[$i]['rane'].",". $rs[$i]['d_ymd'].",".$rs[$i]['dt']. "\n";	
		}
	}


//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーー指定:[名前、年]ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
}elseif($_POST['key1']=="13"){
	for($i=1;$i<13;$i++){
		$tabname="b_".$Y."_".$i;
    	$tabsel="SELECT * FROM ".$tabname;
		try{
		$stmh=$pdo->query($tabsel);
		$stmh->execute();
		}catch(PDOException $Exception){
			print "エラー:".$Exception->getMessage();
		}
		$rs = $stmh->fetchall ();
	}
	$csv = '"","カードID","氏名","作業時間[分]","作業内容","レーン","年月日","時刻"' . "\n";
	
	for($i=0;$i<count($rs);$i++){
		if($rs[$i]['member'] == $key21){
			$csv .= "".",". $rs[$i]['card_id']  .",".  $rs[$i]['member'] .",".  $rs[$i]['work_time'] .",". $rs[$i]['work'] .",". $rs[$i]['rane'].",". $rs[$i]['d_ymd'].",".$rs[$i]['dt']. "\n";	
		}
	}


//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー指定：[年、月、日]ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
}elseif($_POST['key1']=="21"){
	$tabname="b_".$Y."_".$M;
    $tabsel="SELECT * FROM ".$tabname;
    try{
    $stmh=$pdo->query($tabsel);
    $stmh->execute();
    }catch(PDOException $Exception){
        print "エラー:".$Exception->getMessage();
    }
	$rs = $stmh->fetchall ();
	
	$csv = '"","カードID","氏名","作業時間[分]","作業内容","レーン","年月日","時刻"' . "\n";
	
	for($i=0;$i<count($rs);$i++){
		if($rs[$i]['dd'] == $D){
			$csv .= "".",". $rs[$i]['card_id']  .",".  $rs[$i]['member'] .",".  $rs[$i]['work_time'] .",". $rs[$i]['work'] .",". $rs[$i]['rane'].",". $rs[$i]['d_ymd'].",".$rs[$i]['dt']. "\n";	
		}
	}



//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー年月のみ指定ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
}elseif($_POST['key1']=="22"){
	$tabname="b_".$Y."_".$M;
    $tabsel="SELECT * FROM ".$tabname;
    try{
    $stmh=$pdo->query($tabsel);
    $stmh->execute();
    }catch(PDOException $Exception){
        print "エラー:".$Exception->getMessage();
    }
	$rs = $stmh->fetchall ();
	
	$csv = '"","カードID","氏名","作業時間[分]","作業内容","レーン","年月日","時刻"' . "\n";
	
	for($i=0;$i<count($rs);$i++){
		$csv .= "".",". $rs[$i]['card_id']  .",".  $rs[$i]['member'] .",".  $rs[$i]['work_time'] .",". $rs[$i]['work'] .",". $rs[$i]['rane'].",". $rs[$i]['d_ymd'].",".$rs[$i]['dt']. "\n";	
	}

	
//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー年のみ指定ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
}elseif($_POST['key1']=="23"){
	for($i=1;$i<13;$i++){
		$tabname="b_".$Y."_".$i;
    	$tabsel="SELECT * FROM ".$tabname;
		try{
		$stmh=$pdo->query($tabsel);
		$stmh->execute();
		}catch(PDOException $Exception){
			print "エラー:".$Exception->getMessage();
		}
		$rs = $stmh->fetchall ();
	}
	$csv = '"","カードID","氏名","作業時間[分]","作業内容","レーン","年月日","時刻"' . "\n";
	
	for($i=0;$i<count($rs);$i++){
			$csv .= "".",". $rs[$i]['card_id']  .",".  $rs[$i]['member'] .",".  $rs[$i]['work_time'] .",". $rs[$i]['work'] .",". $rs[$i]['rane'].",". $rs[$i]['d_ymd'].",".$rs[$i]['dt']. "\n";	
	}


//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー指定なしーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
}elseif($_POST['key1']=="4"){
	$tabname="b_".$Y."_".$M;
    $tabsel="SELECT * FROM ".$tabname;
    try{
    $stmh=$pdo->query($tabsel);
    $stmh->execute();
    }catch(PDOException $Exception){
        print "エラー:".$Exception->getMessage();
    }
	$rs = $stmh->fetchall ();
	
	$csv = '"","カードID","氏名","作業時間[分]","作業内容","レーン","年月日","時刻"' . "\n";
	
	for($i=0;$i<count($rs);$i++){
		$csv .= "".",". $rs[$i]['card_id']  .",".  $rs[$i]['member'] .",".  $rs[$i]['work_time'] .",". $rs[$i]['work'] .",". $rs[$i]['rane'].",". $rs[$i]['d_ymd'].",".$rs[$i]['dt']. "\n";	
	}	

}
	




/*▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲
    //CSVファイル出力
▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲*/
/*for($i=0;$i<count($rs);$i++){
	mb_convert_variables("UTF-8", "SJIS", $csv[$i]['card_id']);
	mb_convert_variables("UTF-8", "SJIS", $csv[$i]['member']);
	mb_convert_variables("UTF-8", "SJIS", $csv[$i]['work_time']);
	mb_convert_variables("UTF-8", "SJIS", $csv[$i]['work']);
	mb_convert_variables("UTF-8", "SJIS", $csv[$i]['rane']);
	mb_convert_variables("UTF-8", "SJIS", $csv[$i]['d_ymd']);
	mb_convert_variables("UTF-8", "SJIS", $csv[$i]['dt']);
*/
//mb_convert_encoding('ANSI' , 'UTF-8' , $csv );
echo $csv;
return;

?>