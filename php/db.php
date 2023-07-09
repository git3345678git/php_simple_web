<?php

	$host = "localhost";

	$dbuser = "root";

	$dbpw = "root";

	$dbname = 'my_db';



	$link = mysqli_connect($host, $dbuser, $dbpw, $dbname);


	if (mysqli_connect_errno($link)) 
	{ 
	    echo "連接 MySQL 失敗:" . mysqli_connect_error(); 
	}else{
		// echo "連接 MySQL 成功"; 
	}




?>