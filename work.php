<?php
	require_once "./php/db.php";
	require_once "./php/functions.php";

	$work = get_work($_GET['w']);


?>


<!DOCTYPE html>
<html>
<head>
	<title></title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/style.css">	
</head>
<body>




<!-- 首頁 -->
<div class="p-5 bg-dark text-white mb-3 ">
	<div class="container">
	  <div class="row">
		<div class="col-xs-12">
			<h1 class="text-left">我的作品網站</h1>

			<ul class="nav nav-pills">
			  <li class="nav-item">
			    <a class="nav-link text-white " href="index.php">首頁</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link text-white " href="article_list.php">我的文章</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link text-white active" href="work_list.php">我的作品</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link text-white" href="about.php">關於我</a>
			  </li>			  
			</ul>	

	    </div>	    
	  </div>
	</div>
</div>


<!-- 內容 -->
<div class="content">
	<div class="container">
	  <div class="row">
		<div class="col-xs-12">

				<h1 class="card-title"><?php echo $work['intro']; ?></h1>
			
		    	<?php if($work['video_path']): ?>
		    		<div class="ratio ratio-4x3">
					<video  controls>
					  <source src="<?php echo $work['video_path']; ?>" type="video/mp4">							 
					</video>								    		
					</div>
	    		<?php else:?>
	    			<div class="ratio ratio-4x3">
	    				<img src="<?php echo $work['image_path']; ?>" class="img-thumbnail" alt="...">
	    			</div>
    			<?php endif;?>

					<div class="card-body">
						<p class="card-text">上傳時間:<?php echo $work['upload_date']; ?></p>
					</div>




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







<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
</body>
</html>