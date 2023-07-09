<?php

	session_start();

	require_once "../php/db.php";
	require_once "../php/functions.php";


	$work = get_work($_GET['id']);

	

?>

<!DOCTYPE html>
<html>
<head>
	<title>作品新增</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>


<?php
	//如果登入
	if ( isset($_SESSION['is_login']) && $_SESSION['is_login'] == true):
?>
		<!-- 內容 -->
		<div class="content">
			<div class="container">
			  <div class="row">
				<div class="col-xs-12">
						
					<!-- 登出 -->
					<p class="text-end">
						<a href="../php/logout.php">登出</a>
					</p>



					<!-- 後台標題 -->
					<h1 class="text-center">後台</h1>



					<!-- 選單 -->
					<ul class="nav nav-pills mb-3">
					  <li class="nav-item">
					    <a class="nav-link text-black " href="article_list.php">文章管理</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link text-black active " href="work_list.php">作品管理</a>
					  </li>
					</ul>						


					<hr/>
					<h2>作品新增</h2>

					<!-- 表單 -->
					<form method="post" action="../php/work_save.php" enctype="multipart/form-data">

						<input type="hidden" name="id" value="<?php echo ($work['id']); ?>">

						<!-- 標題 -->
						<div class="mb-3">
							<label for="intro" class="form-label">簡介</label>
							<textarea class="form-control"  id="intro" style="height: 200px" name="intro" ><?php echo $work['intro'] ?></textarea> 
						</div>

						<!-- 分類 -->
						<div class="mb-3">
							<label for="image_path" class="form-label">圖片上傳</label>
							<br/>
							<?php if($work['image_path']):?>

									<img src="../<?php echo $work['image_path']; ?>" class="img-fluid">

							<?php endif;?>


							<input type="file" accept=".jpg, .png, .gif"  id="image_path" name="image_path"/>		    
						</div>



						<div class="mb-3">
							<label for="video_path" class="form-label">影片上傳</label>
							<br/>
							<?php if($work['video_path']):?>

									<div class="ratio ratio-16x9">
										<video   controls>
										  <source src="../<?php echo ($work['video_path']); ?>" >							 
										</video>
									</div>
									
							<?php endif;?>

							 <input type="file" accept="video/*"  id="video_path" name="video_path"/>		    
						</div>



						<!-- 發佈狀態 -->
						<div class=" mb-3">
							<div class="form-check form-check-inline">
							    <input class="form-check-input" type="radio" name="publish" id="publish" value="1" <?php echo ($work['publish'] == 1 )?"checked":"" ; ?> />
							    <label class="form-check-label" for="publish">發佈</label>
							</div>
							<div class="form-check form-check-inline">
							    <input class="form-check-input" type="radio" name="publish" id="not_publish" value="0" <?php echo ($work['publish'] == 0 )?"checked":"" ; ?>/>
							    <label class="form-check-label" for="not_publish">不發佈</label>
							</div>							
						</div>

						<br/>


					  	<button type="submit" class="btn btn-primary ">存檔</button>
					</form>						
			
			
			    </div>	    
			  </div>
			</div>	
		</div>


		<!-- footer -->
		<div class="footer">
			<div class="container">
			  <div class="row">
				<div class="col-xs-12">
					<p class="text-center" role="alert">
					 &copy; 2022 05 18
					</p>
			    </div>	    
			  </div>
			</div>	
		</div>

<?php 
	////沒登入
	else:
?>

		<h1>尚未登入</h1>
		<?php header("Location: ../admin/index.php"); ?>




<?php 
	endif; 
?>











<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>
</html>