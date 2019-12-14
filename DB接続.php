<?php

function db_connect(){

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
        print"接続しました<br>";
    }catch(PDOException $Exception){
        die('エラー:'.$Exception->getMessage());
    }
    
    return $pdo;
    
}
?>