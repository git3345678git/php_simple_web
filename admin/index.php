<?php

	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>首頁</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>


<?php

	

	if ( $_SESSION['is_login'] == true):
		//如果有登入，就跳轉
		header("Location: article_list.php");
	
	else:
		//沒有就跳轉到後台登入頁面
?>


		<!-- 內容 -->
		<div class="content">
			<div class="container">
			  <div class="row">
				<div class="col-xs-12 col-sm-4 offset-sm-4 col-lg-2 offset-lg-5">

						<h1>後台登入</h1>
							<form method="post" action="../php/check_login.php">

								<?php
									if(isset($_SESSION['msg'])){
										echo "<p>{$_SESSION['msg']}</p>";
									}
								?>


								  <div class="mb-3">
								    <label for="username" class="form-label">username</label>
								    <input type="text" class="form-control" id="username"  name="username" >
								  </div>

								  <div class="mb-3">
								    <label for="password" class="form-label">Password</label>
								    <input type="password" class="form-control" id="password" name="password">
								  </div>

								  <button type="submit" class="btn btn-primary">Submit</button>

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

<?php endif; ?>











<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>
</html>