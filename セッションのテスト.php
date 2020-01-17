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
    

    <?php
}else{
    print "セッションid不一致";
}

?>
</body>
</html>


