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
    die('エラー:'.$Exception->getMessage());}
/*▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲
▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲*/


header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=GRAYCODE.csv");
header("Content-Transfer-Encoding: binary");

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

	for($i=0;$i<;$i++){
		if($rs[i]['']$key21){

		}

	}

//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーー指定：[名前、年、月]ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
}elseif($_POST['key1']=="12"){
	$search_key='%'. $_POST['key2'].'%';
	//$D=$_POST['year']."-".$_POST['month']."-".$_POST['day'];
	$sql="SELECT * FROM work2 WHERE ( cardID like :cardID OR member like :member OR work like :work ) AND ( year = :year AND month = :month)";
	$stmh=$pdo->prepare($sql);
	$stmh->bindValue(':cardID',$search_key,PDO::PARAM_STR);
	$stmh->bindValue(':member',$search_key,PDO::PARAM_STR);
	$stmh->bindValue(':work',$search_key,PDO::PARAM_STR);
	$stmh->bindValue(':year',$_POST['key21'],PDO::PARAM_STR);
	$stmh->bindValue(':month',$_POST['key22'],PDO::PARAM_STR);
	$stmh->execute();


//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーー名前(orカードID,作業内容)と年指定ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
}elseif($_POST['key1']=="13"){
	$search_key='%'. $_POST['key2'].'%';
	//$D=$_POST['key21']."-".$_POST['key22']."-".$_POST['key23'];
	$sql="SELECT * FROM work2 WHERE ( cardID like :cardID OR member like :member OR work like :work ) AND ( year = :year)";
	$stmh=$pdo->prepare($sql);
	$stmh->bindValue(':cardID',$search_key,PDO::PARAM_STR);
	$stmh->bindValue(':member',$search_key,PDO::PARAM_STR);
	$stmh->bindValue(':work',$search_key,PDO::PARAM_STR);
	$stmh->bindValue(':year',$_POST['key21'],PDO::PARAM_STR);
	$stmh->execute();


//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーー名前(orカードID,作業内容)のみ指定ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
}elseif($_POST['key1']=="2"){


	$search_key='%'. $_POST['key2'].'%';
	$sql="SELECT * FROM work2 WHERE cardID like :cardID OR member like :member OR work like :work ";
	$stmh=$pdo->prepare($sql);
	$stmh->bindValue(':cardID',$search_key,PDO::PARAM_STR);
	$stmh->bindValue(':member',$search_key,PDO::PARAM_STR);
	$stmh->bindValue(':work',$search_key,PDO::PARAM_STR);
	$stmh->execute();


//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー年月日すべて指定ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
}elseif($_POST['key1']=="31"){

	$sql="SELECT * FROM work2 WHERE year = :year AND month = :month AND day = :day";
    $stmh=$pdo->prepare($sql);
	$stmh->bindValue(':year',$_POST['key21'],PDO::PARAM_STR);
	$stmh->bindValue(':month',$_POST['key22'],PDO::PARAM_STR);
	$stmh->bindValue(':day',$_POST['key23'],PDO::PARAM_STR);
    $stmh->execute();
	

//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー年月のみ指定ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
}elseif($_POST['key1']=="32"){

	$sql="SELECT * FROM work2 WHERE year = :year AND month = :month";
    $stmh=$pdo->prepare($sql);
	$stmh->bindValue(':year',$_POST['key21'],PDO::PARAM_STR);
	$stmh->bindValue(':month',$_POST['key22'],PDO::PARAM_STR);
    $stmh->execute();

	
//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー年のみ指定ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
}elseif($_POST['key1']=="33"){

	$sql="SELECT * FROM work2 WHERE year = :year";
    $stmh=$pdo->prepare($sql);
	$stmh->bindValue(':year',$_POST['key21'],PDO::PARAM_STR);
    $stmh->execute();


//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー指定なしーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
}elseif($_POST['key1']=="4"){
    
	$sql="SELECT * FROM work2 WHERE year = :year AND month = :month";
	$stmh=$pdo->prepare($sql);
	$stmh->bindValue(':year',$_POST['key21'],PDO::PARAM_STR);
	$stmh->bindValue(':month',$_POST['key22'],PDO::PARAM_STR);
	$stmh->execute();


}
	




/*▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲
    //CSVファイル作成
▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲*/
$csv = '"","カードID","氏名","作業時間[分]","作業内容","レーン","年月日","時刻"' . "\n";
foreach ( $rs as $row ) {
	$csv .= "".",". $row['card_id']  .",".  $value['member'] .",".  $value['work_time'] .",". $value['work'] .",". $value['rane'].",". $value['d_ymd'].",".$value['dt']. "\n";
}

mb_convert_variables('Shift_JIS' , 'UTF-8' , $csv );
echo $csv;
return;

?>