<?php
require_once("MYDB.php");
$pdo=db_connect();

header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=GRAYCODE.csv");
header("Content-Transfer-Encoding: binary");


//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーー名前(orカードID,作業内容)と年月日すべて指定ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
if($_POST['key1']=="11"){
	$search_key='%'. $_POST['key2'].'%';
	//$D=$_POST['year']."-".$_POST['month']."-".$_POST['day'];
	$sql="SELECT * FROM work2 WHERE ( cardID like :cardID OR member like :member OR work like :work ) AND ( year = :year AND month = :month AND day = :day)";
	$stmh=$pdo->prepare($sql);
	$stmh->bindValue(':cardID',$search_key,PDO::PARAM_STR);
	$stmh->bindValue(':member',$search_key,PDO::PARAM_STR);
	$stmh->bindValue(':work',$search_key,PDO::PARAM_STR);
	$stmh->bindValue(':year',$_POST['key21'],PDO::PARAM_STR);
	$stmh->bindValue(':month',$_POST['key22'],PDO::PARAM_STR);
	$stmh->bindValue(':day',$_POST['key23'],PDO::PARAM_STR);
	$stmh->execute();


//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーー名前(orカードID,作業内容)と年月指定ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
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
	


$csv = '"",カードID","氏名","レーン","作業時間(分)","作業内容","年","月","日"' . "\n";

foreach( $stmh as $value ) {
	$csv .= "".",". $value['cardID']  .",".  $value['member'] .",".  $value['rane'] .",". $value['time'] .",". $value['work'].",". $value['year'].",".$value['month'].",".$value['day'].  "\n";
}

mb_convert_variables('Shift_JIS' , 'UTF-8' , $csv );
echo $csv;
return;

?>