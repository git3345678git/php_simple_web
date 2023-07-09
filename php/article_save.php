<?php

	session_start();

	require_once "db.php";
	require_once "functions.php";


	//var_dump($link);


	if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == true){

		$save_result = article_save($_POST, $link);


		if ($save_result) {
			echo "儲存成功";
		}else{
			echo "儲存失敗";
		}

	}







	header("refresh:1; url=../admin/article_list.php");





?>