<?php 
	require_once '../mysqli_connect.php';
	//print_r($_SESSION);
	if(isset($_SESSION['is_login']) && $_SESSION['is_login']){
		header("Location: index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-COMpatible" content="IE=edge,chrome=1">
<title>後台登入 - DA-DING</title>
<meta name="description" content="公司官方網站">
<meta name="author" content="ChunPei">
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
	integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
	crossorigin="anonymous">
<script
	src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
	integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
	crossorigin="anonymous"></script>
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<link rel="stylesheet" href="assets/css/main.css" />


</head>

<body> 
 <div class="main">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 clo-sm-6 clo-sm-offset-3 thumbnail">
					<h1>後台登入</h1>
					<form class="form-horizontal" id = "login_form" method="post" action="../php/verify_user.php">
						<div class="form-group">
							<label for="account" class="col-sm-4 control-label">帳號</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="account" id="account" placeholder="請輸入您的帳號" required>
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="col-sm-4 control-label">密碼</label>
							<div class="col-sm-4">
								<input type="password" class="form-control" name="password" id="password" placeholder="請輸入您的密碼" required>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-xs-12 text-center">
								<button type="submit" class="btn btn-default">登入</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
 <!--footer-->
	<section id="footer">
		<div class="container">
			<div id="copyright" class="container">
				<ul class="links">
					<li>&copy; Da-Ding. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
				</ul>
			</div>
		</div>
	</section>

	<script>
		$(document).ready(function(){ 	 	
			$("#login_form").submit(function(){
				
					$.ajax({
						type : "POST",
						url : "../php/verify_user.php",
						data : { 
							'account':$("#account").val(),
							'password':$("#password").val() },
						dataType : 'html'
						}).done(function(data){
							console.log(data);
							if( data == "yes"){
								
								window.location.href = "index.php";
							}
							else{
								alert("登入失敗，請確認您的帳號密碼是否正確");
							}
						}).fail(function(jqXHR, textStatus, errorThrown){
							alert("error");
							console.log(jqXHR.responseText);
						});
				
				return false;
 		});
 	 });
	</script>
</body>
</html>