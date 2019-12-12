<?php
function db_connect(){
    $db_user="tatsuya";
    $db_pass="slkmb";
    $db_host="localhost";
    $db_name="tes";
    $db_type="mysql";

    $dsn="$db_type:host=$db_host;dbname=$db_name";

    try{
        $pdo= new PDO($dsn,$db_user,$db_pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); //エラーモードの設定。
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);   //プリペアドステートメントを利用できるようにする。
    
    }catch(PDOException $Exception){
        print"エラー:".$Exception->getMessage();
    }
    return $pdo;
}

?>