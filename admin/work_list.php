<?php 
	require_once '../mysqli_connect.php';
	require_once '../function.php';
	if(!isset($_SESSION['is_login']) || !$_SESSION['is_login']){
		header("Location: login.php");
	}
	$datas = get_all_work();
	//print_r($datas);
?>

<!DOCTYPE html>
<html>
<head>
<title>作品列表 - DA-DING</title>
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
								<h1>作品列表</h1>
							</header>
							<br>
							<div class="row add_btn_area">
								<div class="col-xs-12">
									<a href="work_add.php" class="btn btn-primary">新增作品</a>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-xs-12">
									<table class="table table-hover">
										<tr>
											<th>ID</th>
											<th>標題</th>
											<th>簡介</th>
											<th>圖片路徑</th>
											<th>影片路徑</th>
											<th>發布狀況</th>
											<th>上傳時間</th>
											<th>管理動作</th>
										</tr>
										
										<?php if(!empty($datas)):?>
											<?php foreach($datas as $a_data):?>
											<tr>
												<td><?php echo $a_data['id'];?></td>
												<td><?php echo $a_data['title'];?></td>
												<td><?php echo $a_data['introduce'];?></td>
												<td><?php echo $a_data['image_path'];?></td>
												<td><?php echo $a_data['video_path'];?></td>
												<td><?php echo ($a_data['publish'])?'已發布':'未發布';?></td>
												<td><?php echo $a_data['upload_date'];?></td>
												<td>
													<a href="work_edit.php?i=<?php echo $a_data['id'];?>" class="btn btn-success">編輯</a>
													<a href="javascript:void(0);" class="btn btn-danger del_work" data-id="<?php echo $a_data['id'];?>">刪除</a>
												</td>
											</tr>
											<?php endforeach;?>
										<?php else:?>
											<tr>
												<td colspan="6">無資料</td>
											</tr>
										<?php endif;?>
									</table>
								</div>
							</div>
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
			$("a.del_work").click(function(){
				var c = confirm("您確定要刪除嗎？");
				//console.log($(this).attr("data-id"));
				this_tr = $(this).parent().parent();
					
				if(c){ 	 	 	
					$.ajax({
						type : "POST",
						url : "../php/del_work.php",
						data : { 
							'id':$(this).attr("data-id") },
						dataType : 'html'
						}).done(function(data){
							//console.log(data);
							if( data == "yes"){
								alert("刪除成功");
								this_tr.fadeOut();
							}
							else{
								alert("刪除失敗" + data);
							}
						}).fail(function(jqXHR, textStatus, errorThrown){
							alert("error");
							console.log(jqXHR.responseText);
						});
				}
			});
		});
</script>
</body>
</html>