<?php 
	require_once '../mysqli_connect.php';
	require_once '../function.php';
	if(!isset($_SESSION['is_login']) || !$_SESSION['is_login']){
		header("Location: login.php");
	}
	$data = get_edit_article($_GET['i']);
	//print_r($datas);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-COMpatible" content="IE=edge,chrome=1">
<title>公司網站後台-文章編輯</title>
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
					<form id="article">
						<input type="hidden" id="id" value="<?php echo $data['id'];?>">
						<div class="form-group">
							<label for="title">標題</label> <input
								type="text" class="form-control" id="title"
								placeholder="輸入標題" value="<?php echo $data['title'];?>">
						</div>
						<div class="form-group">
							<label for="category">分類</label>
							<select id="category" class="form-control">
								<option value="新聞" <?php echo ($data['category'] == "新聞")?'selected':'';?>>新聞</option>
								<option value="心得" <?php echo ($data['category'] == "心得")?'selected':'';?>>心得</option>
							</select>
						</div>
						<div class="form-group">
							<label for="content">內文</label>
							<textarea id="content" class="form-control" rows="10"><?php echo $data['content'];?></textarea>
						</div>
						<div class="form-group">
							<label class="radio-inline"> 
								<input type="radio" name="publish" value="1" <?php echo ($data['publish'] == 1)?'checked':'';?>>發布
							</label> 
							<label class="radio-inline"> 
								<input type="radio" name="publish" value="0" <?php echo ($data['publish'] == 0)?'checked':'';?>> 不公開
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
 	 	 	 	
 		$("#article").submit(function(){
 	 		if($("#title").val() == '' || $("#content").val == ''){
 	 	 		alert("請填寫標題及內文");
 	 	 	}
 	 		else{
 	 	 		$.ajax({
 	 	 	 		type : "POST",
 	 	 	 		url : "../php/update_article.php",
 	 	 	 	 	data : { 
 	 	 	 	 		'id':$("#id").val(),
 	 	 	 	 	 	'title':$("#title").val(),
 	 	 	 	 	 	'category':$("#category").val(),
 	 	 	 	 		'content':$("#content").val(),
 	 	 	 	 		'publish':$("input[name='publish']:checked").val() },
 	 	 	 	 	dataType : 'html'
 	 	 	 		}).done(function(data){
 	 	 	 	 		console.log(data);
 	 	 	 	 		if( data == "yes"){
 	 	 	 	 	 		alert("更新成功，點擊確認回到列表頁");
 	 	 	 	 	 		window.location.href = "article_list.php";
 	 	 	 	 	 	}
 	 	 	 	 		else{
 	 	 	 	 	 		alert("更新失敗，"+data);
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