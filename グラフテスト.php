<html> 
<head>
    <title>ホームページ</title>
    <meta charset=utf-8>
    <link rel="stylesheet" type="text/css" href="tes1.css">
</head>

<body bgcolor="#e0ffff" text="#000000">

<?php
$hoge[0] = "name";
$hoge[1] = "aaa";

?>

<script type="text/javascript">
    var hoge = <?php echo json_encode($hoge); ?>;
    console.log(hoge); 
    console.log(hoge[1]);
</script>

</body>
</html>


