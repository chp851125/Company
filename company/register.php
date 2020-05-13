<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-COMpatible" content="IE=edge,chrome=1">
<title>會員註冊</title>
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


<link rel="shortcut icon" href="/favicon.ico">
<link rel="apple-touch-icon" href="apple-touch-icon.png">

<title>No Sidebar - Strongly Typed by HTML5 UP</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<link rel="stylesheet" href="assets/css/main.css" />


</head>

<body class="no-sidebar is-preload">
	<div id="page-wrapper">
		<?php include_once 'menu.php';?>
		<section id="main">
			<div class="container">
				<div id="content">
					<form class="form-horizontal" id = "register_form" method="post" action="php/add_member.php">
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
							<label for="confirm_password" class="col-sm-4 control-label">確認密碼</label>
							<div class="col-sm-4">
								<input type="password" class="form-control" id="confirm_password" placeholder="再次輸入您的密碼" required>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="col-sm-4 control-label">名字</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="name" id="name" placeholder="請輸入您的名字" required>
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
		</section>
		<?php include_once('footer.php');?>
	</div>
 <script>
 	$(document).ready(function(){
 	 	$("#account").keyup(function(){
 	 	 	if($(this).val() != ''){
 	 	 		$.ajax({
 	 	 	 		type : "POST",
 	 	 	 		url : "php/check_account.php",
 	 	 	 	 	data : { 'n':$(this).val() },
 	 	 	 	 	dataType : 'html'
 	 	 	 		}).done(function(data){
 	 	 	 	 		console.log(data);
 	 	 	 	 		if( data == "yes"){
 	 	 	 	 	 		$("#account").parent().parent().removeClass('has-success').addClass('has-error');
 	 	 	 	 	 		//$("#register_form button[type='submit']").addClass('disabled');
 	 	 	 	 	 		$('#register_form button[type="submit"]').attr('disabled', true);
 	 	 	 	 	 	}
 	 	 	 	 		else{
 	 	 	 	 	 		$("#account").parent().parent().removeClass('has-error').addClass('has-success');
 	 	 	 	 	 		$('#register_form button[type="submit"]').attr('disabled', false);
 	 	 	 	 	 	}
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
 	 	 	if($("#password").val() != $("#confirm_password").val()){
 	 	 	 	$("#password").parent().parent().addClass("has-error");
 	 	 	    $("#confirm_password").parent().parent().addClass("has-error");
	 	 	 	
 	 	 		alert("密碼不相符，請再次輸入");
 	 	 		return false;
 	 	 	}
 	 	 	else{
 	 	 		$.ajax({
 	 	 	 		type : "POST",
 	 	 	 		url : "php/add_user.php",
 	 	 	 	 	data : { 
 	 	 	 	 	 	'account':$("#account").val(),
 	 	 	 	 	 	'password':$("#password").val(),
 	 	 	 	 	 	'name':$("#name").val() },
 	 	 	 	 	dataType : 'html'
 	 	 	 		}).done(function(data){
 	 	 	 	 		console.log(data)
 	 	 	 	 		if( data == "yes"){
 	 	 	 	 	 		alert("註冊成功，請按確認轉跳登入頁");
 	 	 	 	 	 		window.location.href = "admin/index.php";
 	 	 	 	 	 	}
 	 	 	 	 		else{
 	 	 	 	 	 		alert("註冊失敗，請確認您的電腦連線狀態或連繫您的系統管理員");
 	 	 	 	 	 	}
 	 	 	 	 	}).fail(function(jqXHR, textStatus, errorThrown){
 	 	 	 	 	 	alert("error");
 	 	 	 	  		console.log(jqXHR.responseText);
 	 	 	 	 	});
 	 	 	}
 	 	 	return false;
 		});
 	 });
 </script>
</body>
</html>