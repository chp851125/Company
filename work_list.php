<?php
require_once 'mysqli_connect.php';
require_once 'function.php';

$datas = get_publish_work();

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-COMpatible" content="IE=edge,chrome=1">
<title>作品列表 - DA-DING</title>
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

<body class="no-sidebar is-preload">
	<div id="page-wrapper">
		<?php include_once 'menu.php';?>
		<section id="main">
			<div class="container">
				<div id="content">
					<?php if(!empty($datas)):?>
					<?php foreach($datas as $a_work):?>
						<div class="col-xs-12 col-sm-4">
							<div class="thumbnail">
								<?php if($a_work['image_path']):?>
									<img src="<?php echo $a_work['image_path'];?>" class="img-responsive">
								<?php else:?>
								<div class="embed-responsive embed-responsive-16by9">
									 <video src="<?php echo $a_work['video_path'];?>" controls></video>
								</div>
								<?php endif;?>
								<div class="caption">
									<?php echo $a_work['title'];?>
									<div align="center">
										<a href="work.php?i=<?php echo $a_work['id']?>" class="btn btn-custom" type="button">詳 細 內 容</a>
									</div>
								</div>
							</div>
						</div>
					 <?php endforeach;?>
					 <?php else: ?>
					 <h1>尚無資料</h1>
					 <?php endif;?>
				</div>
			</div>
		</section>
		<?php include_once('footer.php');?>
	</div>
</body>
</html>