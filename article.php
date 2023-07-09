<?php
	require_once "./php/db.php";
	require_once "./php/functions.php";

	$article = get_article($_GET['p']);


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


			
			<?php if($article): ?>

					<!-- 有資料就show -->
					<h1><?php echo ($article['title']); ?></h1>
					<hr/>
					
					分類:<?php echo ($article['category']); ?><br/>
					發佈時間:<?php echo ($article['create_date']); ?><br/><br/>					

					<?php echo ($article['content']); ?>

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