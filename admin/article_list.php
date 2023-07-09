<?php

	session_start();

	require_once "../php/db.php";
	require_once "../php/functions.php";


	$datas = get_all_article();

	

?>

<!DOCTYPE html>
<html>
<head>
	<title>作品後台管理</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" src="../js/admin.js"></script>
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

					<!--新增文章  -->
					<a href="article_add.php" class="btn btn-success">新增文章</a>
					<hr/>


					<!-- 撈出的文章資料 -->
					<?php if($datas): ?>

							<table class="table">
							  <thead>
							    <tr>
							      <th scope="col">標題</th>
							      <th scope="col">分類</th>
							      <th scope="col">發佈狀態</th>
							      <th scope="col">新增時間</th>
							      <th scope="col">修改時間</th>
							      <th scope="col">管理動作</th>
							    </tr>
							  </thead>

							  <tbody>
							   
									<!-- 有資料就show -->
									<?php foreach ($datas as $row):?>
																	      
								     	<tr>
										      <td><?php echo ($row['title']); ?></td>
										      <td><?php echo ($row['category']); ?></td>
										      <td><?php echo ($row['publish']); ?></td>
										      <td><?php echo ($row['create_date']); ?></td>
										      <td><?php echo ($row['modify_date']); ?></td>							      

										      <td>
										      	<a href="article_edit.php?id=<?php echo ($row['id']) ;?>" > 編輯</a>
										      	<a href="../php/article_del.php?id=<?php echo ($row['id']) ;?>" class="del" > 刪除</a>
										      </td>									      									      
							    		</tr>

									<?php endforeach; ?>

							  </tbody>
							</table>


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