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
<title>新增文章 - DA-DING</title>
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
								<h1>新增文章</h1>
							</header>
							<form id="article">
								<div class="form-group">
									<label for="title">標題</label> <input
										type="text" class="form-control" id="title"
										placeholder="輸入標題">
								</div>
								<div class="form-group">
									<label for="category">分類</label>
									<select id="category" class="form-control">
										<option value="新聞">公告</option>
										<option value="心得">心得</option>
										<option value="心得">作品</option>
										<option value="心得">其他</option>
									</select>
								</div>
								<div class="form-group">
									<label for="content">內文</label>
									<textarea id="content" class="form-control" rows="10"></textarea>
								</div>
								<br>
								<div class="form-group">
									<input class="form-check-input" type="radio" name="publish" id="publish" value="1" checked>
									<label class="form-check-label" for="publish">
										發布
									</label>
									<input class="form-check-input" type="radio" name="publish" id="publish0" value="0">
									<label class="form-check-label" for="publish0">
										不公開
									</label>
								</div>
								<br><br>
								<button type="submit" class="btn btn-default">確認</button>
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
					
			$("#article").submit(function(){
				if($("#title").val() == '' || $("#content").val == ''){
					alert("請填寫標題及內文");
				}
				else{
					$.ajax({
						type : "POST",
						url : "../php/add_article.php",
						data : { 
							'title':$("#title").val(),
							'category':$("#category").val(),
							'content':$("#content").val(),
							'publish':$("input[name='publish']:checked").val() },
						dataType : 'html'
						}).done(function(data){
							console.log(data);
							if( data == "yes"){
								alert("新增成功，點擊確認回到列表頁");
								window.location.href = "article_list.php";
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
