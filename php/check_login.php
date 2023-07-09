<?php

	session_start();

	require_once "db.php";
	require_once "functions.php";







	if ( isset($_POST['username']) && isset($_POST['password'])  ) {


		//檢查資料庫是否存在使用者帳密
		$has_user = login($_POST['username'], $_POST['password'] );

		


		if($has_user){
			//如果資料庫存在
			$_SESSION['is_login'] = true;



		}else{

			$_SESSION['is_login'] = false;

			$_SESSION['msg'] = 'login failed please check username and password';


		}

	}




	header("Location: ../admin/index.php");





?>