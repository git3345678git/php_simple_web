<?php

	session_start();

	require_once "../php/db.php";
	require_once "../php/functions.php";


	$article = get_article($_GET['id']);

	

?>

<!DOCTYPE html>
<html>
<head>
	<title>文章編輯</title>

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
					    <a class="nav-link text-black active" href="article_list.php">文章管理</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link text-black " href="work_list.php">作品管理</a>
					  </li>
					</ul>						


					<hr/>
					<h2>文章編輯</h2>

					<!-- 表單 -->
					<form method="post" action="../php/article_save.php">

						<input type="hidden" name="id" value="<?php echo ($article['id']); ?>">

						<!-- 標題 -->
						<div class="mb-3">
							<label for="title" class="form-label">標題</label>
							<input type="text" class="form-control" id="title" name="title" value="<?php echo ($article['title']); ?>">
						</div>

						<!-- 分類 -->
						<div class="mb-3">
							<label for="category" class="form-label">分類</label>
							<select class="form-select" aria-label="Default select example" name="category" id="category">
							  <option value="心得" <?php if($article['category'] == '心得' ) echo 'selected'; ?> >心得</option>
							  <option value="消息" <?php if($article['category'] == '消息' ) echo 'selected'; ?> >消息</option>
							  <option value="新聞" <?php if($article['category'] == '新聞' ) echo 'selected'; ?> >新聞</option>
							</select>					    
						</div>



						<!-- 內文 -->
						<div class=" mb-3">
							<label for="content" class="form-label">內文</label> 
							<textarea class="form-control"  id="content" style="height: 200px" name="content" ><?php echo ($article['content']); ?></textarea> 
						</div>



						<!-- 發佈狀態 -->
						<div class=" mb-3">
							<div class="form-check form-check-inline">
							    <input class="form-check-input" type="radio" name="publish" id="publish" value="1" <?php echo ($article['publish'] == 1 )?"checked":"" ; ?> />
							    <label class="form-check-label" for="publish">發佈</label>
							</div>
							<div class="form-check form-check-inline">
							    <input class="form-check-input" type="radio" name="publish" id="not_publish" value="0" <?php echo ($article['publish'] == 0 )?"checked":"" ; ?> />
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