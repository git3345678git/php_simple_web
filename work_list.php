<?php
	require_once "./php/db.php";
	require_once "./php/functions.php";

	$all_work = get_publish_work();



?>



<!DOCTYPE html>
<html>
<head>
	<title>我的作品</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/style.css">	
</head>
<body>

<!-- 首頁 -->
<div class="p-5 bg-dark text-white ">
	<div class="container">
	  <div class="row">
		<div class="col-xs-12">
			<h1 class="text-left">我的作品網站</h1>

			<ul class="nav nav-pills">
			  <li class="nav-item">
			    <a class="nav-link text-white " href="index.php">首頁</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link text-white" href="article_list.php">我的文章</a>
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
		
			<!-- 如果有內容 -->
			<?php if($all_work): ?>

					<!-- 循環陣列內容 -->
					<div class="row row-cols-1 row-cols-md-3 g-4">
						<?php foreach($all_work as $work):?>

								

									  <div class="col">
									    <div class="card **border-0 p-0**">


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
													<h5 class="card-title"><?php echo $work['intro']; ?></h5>
													<p class="card-text">上傳時間:<?php echo $work['upload_date']; ?></p>
													<a href="work.php?w=<?php  echo $work['id']; ?>" class="btn btn-primary">Go</a>
												</div>
									    </div>
									  </div>
								
						    	 
						<?php endforeach;?>

					</div>



			<?php else: ?>

					<!--  no data -->
					<h1>no data</h1>



			<?php endif; ?>

  
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
