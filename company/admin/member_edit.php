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
<meta charset="utf-8">
<meta http-equiv="X-UA-COMpatible" content="IE=edge,chrome=1">
<title>公司網站後台-會員編輯</title>
<meta name="description" content="公司官方網站">
<meta name="author" content="ChunPei">
<meta name="viewport" content="width=divice-width, initial-scale=1.0">
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
<link rel="stylesheet" href="../css/style.css" />

<link rel="shortcut icon" href="../favicon.ico">
<link rel="apple-touch-icon" href="apple-touch-icon.png">


</head>

<body>
 <?php include_once 'menu_admin.php';?>
  
 <div class="main">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
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
				</div>
			</div>
		</div>
	</div>
 
 <?php include_once('footer_admin.php');?>
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