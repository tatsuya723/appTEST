<?php
session_start();
?>
<html>
<head>
<title>セッションのテスト</title>
</head>
<body>

<?php
$_SESSION["pass"] = htmlspecialchars($_POST["pass"]);
$pass = "style";
if($_SESSION["pass"]==$pass){    
    print "セッションid=pass<br>";
    ?>
    <a href="setes.php"><font size="5">セッションテストページ</font></a><br>

    <?php
}else{
    print "セッションid不一致";
}

?>
</body>
</html>


