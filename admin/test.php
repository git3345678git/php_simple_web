<?php

	session_start();

	require_once "../php/db.php";
	require_once "../php/functions.php";


	$datas = get_all_work();

	

?>

<!DOCTYPE html>
<html>
<head>
	<title>作品後台管理</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" src="../js/admin.js"></script>
</head>
<body>




<img src=".././files/images/Koala.jpg" class="list_cover" style="width:120px">










<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>
</html>




