<?php
	require_once "./php/db.php";
	require_once "./php/functions.php";

	$all_article = get_publish_article();


?>


<!DOCTYPE html>
<html>
<head>
	<title>我的文章</title>

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
			    <a class="nav-link text-white active" href="article_list.php">我的文章</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link text-white" href="work_list.php">我的作品</a>
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


			
			<?php if($all_article): ?>

					<!-- 有資料就show -->
					<?php foreach ($all_article as $row):?>

						<?php
							$str = strip_tags($row['content']);
							$str = mb_substr($str, 0,100);
						?>


						<div class="card mb-3">
						  	<!-- title -->
						  <h5 class="card-header"><a href="article.php?p=<?php echo ($row['id']) ;?>"><?php echo ($row['title']) ;?></a></h5>
						  <div class="card-body">

							<!--lable  -->
							<span class="badge text-bg-primary">
								<?php echo ($row['category']) ;?>
							</span>


							<!--create_date  -->				
							<span class="badge text-bg-warning">
								<?php echo ($row['create_date']) ;?>
							</span>


							<!-- text -->
						    <p class="card-text"><?php echo ($str).('...more') ;?></p>

						  </div>
						</div>

					<?php endforeach; ?>

			<?php else: ?>
					<!--  no data -->

					<h1>no data</h1>
			<?php endif; ?>




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