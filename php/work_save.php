<?php

	session_start();

	require_once "db.php";
	require_once "functions.php";


	//var_dump($link);







	if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == true){

/*
		$file_name     = $_FILES["photo"]["name"];
        $file_type     = $_FILES["photo"]["type"];
        $file_size     = $_FILES["photo"]["size"];
        $file_tmp_name = $_FILES["photo"]["tmp_name"];
        $file_error = $_FILES["photo"]["error"];
         
*/		


        print_r($_FILES);

		if(file_exists($_FILES['image_path']["tmp_name"])){

			$folder = "files/images/";


			$file_name = $_FILES['image_path']["name"];


			move_uploaded_file($_FILES['image_path']["tmp_name"], "../" . $folder . $file_name );

			$_POST['image_path'] = $folder. $file_name;

		}


		if(file_exists($_FILES['video_path']["tmp_name"])){

			$folder = "files/videos/";


			$file_name = $_FILES['video_path']["name"];


			move_uploaded_file($_FILES['video_path']["tmp_name"], "../" . $folder . $file_name );

			$_POST['video_path'] = $folder. $file_name;

		}

		






		$save_result = work_save($_POST, $link);


		if ($save_result) {
			echo "儲存成功";
		}else{
			echo "儲存失敗";
		}

	}







	header("refresh:10; url=../admin/work_list.php");





?>