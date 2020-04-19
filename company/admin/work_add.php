<?php 
	require_once '../mysqli_connect.php';
	require_once '../function.php';
	if(!isset($_SESSION['is_login']) || !$_SESSION['is_login']){
		header("Location: login.php");
	}
	//$datas = get_all_article();
	//print_r($datas);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-COMpatible" content="IE=edge,chrome=1">
<title>公司網站後台-作品新增</title>
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
					<h2>新增作品</h2>
					<form id="work">
						<div class="form-group">
							<label for="title">簡介</label> 
							<textarea id="introduce" class="form-control" rows="10"></textarea>
						</div>
						
						<div class="form-group">
							<label for="content">圖片上傳</label>
							<input type="file" class="image" accept="image/gif, image/jpeg, image/png">
							<input type="hidden" id="image_path" value="">
							<div class="show_image"></div>
							<a href='javascript:void(0);' class="del_image btn btn-default">刪除</a>
						</div>
						<div class="form-group">
							<label for="content">影片上傳</label>
							<input type="file" class="video" accept="video/mp4">
							<input type="hidden" id="video_path" value="">
							<div class="show_video"></div>
							<a href='javascript:void(0);' class="del_video btn btn-default">刪除</a>
						</div>
						
						<div class="form-group">
							<label class="radio-inline"> 
								<input type="radio" name="publish" value="1" checked> 發布
							</label> 
							<label class="radio-inline"> 
								<input type="radio" name="publish" value="0"> 不公開
							</label> 
						</div>
						<button type="submit" class="btn btn-default">確認</button>
					</form>
				</div>
			</div>
		</div>
	</div>
 
 <?php include_once('footer_admin.php');?>
 <script>
 	$(document).ready(function(){

 	 	/*圖片上傳*/
 	 	$("input.image").change(function(){
 	 	 	var save_path = "files/images/",
 	 	 		form_data = new FormData(),
 	 	 		file_data = $(this)[0].files[0];
	 	 		
	 	 	form_data.append("file", file_data);
	 	 	form_data.append("save_path", save_path);

	 	 	$.ajax({
		 	 	type : 'POST',
		 	 	url : '../php/upload_file.php',
		 	 	data : form_data,
		 	 	cache : false,
		 	 	processData : false,
		 	 	contentType : false,
		 	 	dataType : 'html'
		 	}).done(function(data){
			 	if(data == "yes"){
				 	$("div.show_image").html("<img src='../" + save_path + file_data['name'] + "'>");
				 	$("#image_path").val(save_path + file_data['name']);
				}
			 	//console.log(data);
			}).fail(function(jqXHR, textStatus, errorThrown){
				alert("error");
				console.log(jqXHR.responseText);
			});
 	 	 });

	 	 //圖片刪除
	 	 $("a.del_image").click(function(){
		 	 if($("#image_path").val() != ''){
		 		var c = confirm("確定刪除？");
			 	 if(c){
				 	 $.ajax({
					 	 type : 'POST',
					 	 url : '../php/del_file.php',
					 	 data : {
						 	 'file' : $("#image_path").val()
						 },
						 dataType : 'html'
				 }).done(function(data){
					 if (data == "yes"){
						 $("div.show_image").html("");
						 $("#image_path").val('');
						 $("input.image").val('')
					 }
				  }).fail(function(jqXHR, textStatus, errorThrown){
					alert("error");
					console.log(jqXHR.responseText);
				 });
			   }
			 } 
			 else{
				 alert("尚未上傳檔案");
			 }
		 });

		 //影片上傳
		 $("input.video").change(function(){
 	 	 	var save_path = "files/videos/",
 	 	 		form_data = new FormData(),
 	 	 		file_data = $(this)[0].files[0];
	 	 		
	 	 	form_data.append("file", file_data);
	 	 	form_data.append("save_path", save_path);

	 	 	$.ajax({
		 	 	type : 'POST',
		 	 	url : '../php/upload_file.php',
		 	 	data : form_data,
		 	 	cache : false,
		 	 	processData : false,
		 	 	contentType : false,
		 	 	dataType : 'html'
		 	}).done(function(data){
			 	if(data == "yes"){
				 	$("div.show_video").html("<video src='../" + save_path + file_data['name'] + "' controls>");
				 	$("#video_path").val(save_path + file_data['name']);
				}
			 	//console.log(data);
			}).fail(function(jqXHR, textStatus, errorThrown){
				alert("error");
				console.log(jqXHR.responseText);
			});
 	 	 });

		//影片刪除
	 	 $("a.del_video").click(function(){
		 	 if($("#video_path").val() != ''){
		 		var c = confirm("確定刪除？");
			 	 if(c){
				 	 $.ajax({
					 	 type : 'POST',
					 	 url : '../php/del_file.php',
					 	 data : {
						 	 'file' : $("#video_path").val()
						 },
						 dataType : 'html'
				 }).done(function(data){
					 if (data == "yes"){
						 $("div.show_video").html("");
						 $("#video_path").val('');
						 $("input.video").val('')
					 }
				  }).fail(function(jqXHR, textStatus, errorThrown){
					alert("error");
					console.log(jqXHR.responseText);
				 });
			   }
			 } 
			 else{
				 alert("尚未上傳檔案");
			 }
		 });

 	 	 

 	 	$("#work").submit(function(){
 	 		if($("#introduce").val() == ''){
 	 	 		alert("請填寫簡介");
 	 	 	}
 	 		else{
 	 	 		$.ajax({
 	 	 	 		type : "POST",
 	 	 	 		url : "../php/add_work.php",
 	 	 	 	 	data : { 
 	 	 	 	 	 	'introduce':$("#introduce").val(),
 	 	 	 	 	 	'image_path':$("#image_path").val(),
 	 	 	 	 		'video_path':$("#video_path").val(),
 	 	 	 	 		'publish':$("input[name='publish']:checked").val() },
 	 	 	 	 	dataType : 'html'
 	 	 	 		}).done(function(data){
 	 	 	 	 		//console.log(data);
 	 	 	 	 		if( data == "yes"){
 	 	 	 	 	 		alert("新增成功，點擊確認回到列表頁");
 	 	 	 	 	 		window.location.href = "work_list.php";
 	 	 	 	 	 	}
 	 	 	 	 		else{
 	 	 	 	 	 		alert("新增失敗，"+data);
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