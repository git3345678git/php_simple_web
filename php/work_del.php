<?php

	session_start();

	require_once "db.php";
	require_once "functions.php";


	//var_dump($link);


	if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == true){

		$save_result = work_del($_GET['id']);


		if ($save_result) {
			echo "刪除成功";
		}else{
			echo "刪除失敗";
		}

	}







	header("refresh:5; url=../admin/work_list.php");





?>