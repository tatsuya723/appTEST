<?php
if(isset($_POST['csv'])){
$CC=$_POST['csv'];
//require_once("MYDB.php");
//require_once("list0.php");
//$pdo=db_connect();

header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=GRAYCODE.csv");
header("Content-Transfer-Encoding: binary");
//require_once("list0.php");
$csv = null;

// 1行目のラベルを作成
$csv = '"",カードID","氏名","レーン","作業時間","作業内容","日付"' . "\n";

//$sql="SELECT * FROM CARD";
//$stmh=$pdo->query($sql);

// 出力データ生成
foreach( $CC as $value ) {
	$csv .= "".",". $value['cardID']  .",".  $value['member'] .",".  $value['rane'] .",". $value['time'] .",". $value['work'].",". $value['data'].  "\n";
}

//csvファイルの文字コードをShift_JISに変換する　(エクセルでの文字化けを防止するため)
mb_convert_variables('Shift_JIS' , 'UTF-8' , $csv );

// CSVファイル出力
echo $csv;
return;
}
?>
