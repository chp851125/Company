<?php 
	require_once '../mysqli_connect.php';
	require_once '../function.php';
	if(!isset($_SESSION['is_login']) || !$_SESSION['is_login']){
		header("Location: login.php");
	}
	$data = get_user($_GET['i']);
	//print_r($datas);
?>

<!DOCTYPE html>
<html>
<head>
<title>編輯帳號 - DA-DING</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<link rel="stylesheet" href="assets/css/main.css" />

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
</head>

<body class="is-preload">
	<!-- Wrapper -->
		<div id="wrapper">
			<!-- Main -->
				<div id="main">
					<div class="inner">

						<!-- Content -->		
						<section>
							<header class="main">
								<h1>編輯帳號</h1>
							</header>
							<form class="form-horizontal" id = "register_form">
								<input type="hidden" id="id" value="<?php echo $data['id'];?>">
								<div class="form-group">
									<label for="account" class="col-sm-4 control-label">帳號</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" name="account" id="account" placeholder="請輸入您的帳號" required value="<?php echo $data['account'];?>">
									</div>
								</div>
								<div class="form-group">
									<label for="password" class="col-sm-4 control-label">密碼</label>
									<div class="col-sm-4">
										<input type="password" class="form-control" name="password" id="password" placeholder="請輸入您的密碼" required>
									</div>
								</div>
								<div class="form-group">
									<label for="name" class="col-sm-4 control-label">名字</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" name="name" id="name" placeholder="請輸入您的名字" required value="<?php echo $data['name'];?>">
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 text-center">
										<button type="submit" class="btn btn-default">確認</button>
									</div>
								</div>
							</form>
					</section>
					</div>
				</div>
			<?php include_once 'menu_admin.php';?>
		</div>
 
<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>
	<script>
		$(document).ready(function(){
			$("#account").keyup(function(){
				if($(this).val() != ''){
					$.ajax({
						type : "POST",
						url : "../php/check_account.php",
						data : { 'n':$(this).val() },
						dataType : 'html'
						}).done(function(data){
							console.log(data);
							/*if( data == "yes"){
								$("#account").parent().parent().removeClass('has-success').addClass('has-error');
								//$("#register_form button[type='submit']").addClass('disabled');
								$('#register_form button[type="submit"]').attr('disabled', true);
							}
							else{
								$("#account").parent().parent().removeClass('has-error').addClass('has-success');
								$('#register_form button[type="submit"]').attr('disabled', false);
							}*/
						}).fail(function(jqXHR, textStatus, errorThrown){
							alert("error");
							console.log(jqXHR.responseText);
						});
				} 	 	 
				else{
					$("#account").parent().parent().removeClass('has-error').removeClass('has-success');
					$('#register_form button[type="submit"]').attr('disabled', false);
				}
			});


			
			$("#register_form").submit(function(){
				
					$.ajax({
						type : "POST",
						url : "../php/update_user.php",
						data : { 
							'id' : $("#id").val(),
							'account':$("#account").val(),
							'password':$("#password").val(),
							'name':$("#name").val() },
						dataType : 'html'
						}).done(function(data){
							console.log(data)
							if( data == "yes"){
								alert("更新成功，請按確認轉跳登入頁");
								window.location.href = "member_list.php";
							}
							else{
								alert("更新失敗");
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