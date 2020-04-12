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
<title>所有作品</title>
<meta name="description" content="公司官方網站">
<meta name="author" content="ChunPei">
<meta name="viewport" content="width=divice-width, initial-scale=1.0">

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
<link rel="stylesheet" href="css/style.css" />

<link rel="shortcut icon" href="/favicon.ico">
<link rel="apple-touch-icon" href="apple-touch-icon.png">

</head>

<body>
 <?php include_once 'menu.php';?>
  
 <div class="main">
		<div class="container">
			<div class="row">
   
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
							<?php echo $a_work['introduce'];?>
							<p>
								<a href="work.php?i=<?php echo $a_work['id']?>" class="btn btn-primary" role="button">查看作品</a>
							</p>
						</div>
					</div>
				</div>
     
   			 <?php endforeach;?>
    		 <?php else: ?>
    		 <h1>尚無資料</h1>
   			 <?php endif;?>
  			 </div>
		</div>
	</div>
 
 <?php include_once('footer.php');?>
 
</body>
</html>