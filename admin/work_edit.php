<?php 
	require_once '../mysqli_connect.php';
	require_once '../function.php';
	if(!isset($_SESSION['is_login']) || !$_SESSION['is_login']){
		header("Location: login.php");
	}
	$data = get_edit_work($_GET['i']);
	//print_r($data);
?>

<!DOCTYPE html>
<html>
<head>
<title>編輯作品 - DA-DING</title>
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
								<h1>編輯作品</h1>
							</header>
							<form id="work">
								<input type="hidden" id="id" value="<?php echo $data['id'];?>">
								<div class="form-group">
									<label for="title">標題</label> 
									<textarea id="title" class="form-control" rows="1"><?php echo $data['title'];?></textarea>
								</div>

								<div class="form-group">
									<label for="introduce">簡介</label> 
									<textarea id="introduce" class="form-control" rows="10"><?php echo $data['introduce'];?></textarea>
								</div>
								
								<div class="form-group">
									<label for="content">圖片上傳</label>
									<input type="file" class="image" accept="image/gif, image/jpeg, image/png">
									<input type="hidden" id="image_path" value="<?php echo (!is_null($data['image_path']))?$data['image_path']:"";?>">
									<div class="show_image">
									<?php if(!is_null($data['image_path'])):?>
										<img src="<?php echo '../' . $data['image_path'];?>" width="300">
									<?php endif;?>
									</div>
									<br>
									<a href='javascript:void(0);' class="del_image btn btn-default">刪除</a>
								</div>
								<br>
								<div class="form-group">
									<label for="content">影片上傳</label>
									<input type="file" class="video" accept="video/mp4, video/webm">
									<input type="hidden" id="video_path" value="<?php echo (!is_null($data['video_path']))?$data['video_path']:"";?>">
									<div class="show_video">
									<?php if(!is_null($data['video_path'])):?>
										<div><video src='<?php echo "../" . $data['video_path'];?>' controls width="300"></video></div>
									<?php endif;?>
									</div>
									<br>
									<a href='javascript:void(0);' class="del_video btn btn-default">刪除</a>
								</div>
								<br>
								<div class="form-group">
									<input class="form-check-input" type="radio" name="publish" id="publish" value="1" <?php echo ($data['publish'] == 1)?"checked":"";?>>
									<label class="form-check-label" for="publish">
										發布
									</label>
									<input class="form-check-input" type="radio" name="publish" id="publish0" value="0" <?php echo ($data['publish'] == 0)?"checked":"";?>>
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

			/*圖片上傳*/
			$("input.image").change(function(){
				var save_path = "files/images/",
					form_data = new FormData(),
					file_data = $(this)[0].files[0];
					
				form_data.append("file", file_data);
				form_data.append("save_path", save_path);

				$("div.show_video").html('<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>');

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

				$("div.show_video").html('<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>');

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
				if($("#title").val() == ''){
					alert("請填寫標題");
				}
				else{
					$.ajax({
						type : "POST",
						url : "../php/update_work.php",
						data : { 
							'id':$("#id").val(), 
							'title':$("#title").val(),
							'introduce':$("#introduce").val(),
							'image_path':$("#image_path").val(),
							'video_path':$("#video_path").val(),
							'publish':$("input[name='publish']:checked").val() },
						dataType : 'html'
						}).done(function(data){
							//console.log(data);
							if( data == "yes"){
								alert("更新成功，點擊確認回到列表頁");
								window.location.href = "work_list.php";
							}
							else{
								alert("更新失敗，"+ data);
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