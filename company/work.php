<?php 
require_once 'mysqli_connect.php';
require_once 'function.php';

$work = get_work($_GET['i']);
//echo $_GET['i'];
$site_title = strip_tags($work['introduce']);
$site_title = mb_substr($site_title, 0, 11, "UTF-8");
?>

<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-COMpatible" content="IE=edge,chrome=1">
 <title><?php echo $site_title['title'];?></title>
 <meta name="description" content="公司官方網站">
 <meta name="author" content="ChunPei">
 <meta name="viewport" content="width=divice-width, initial-scale=1.0">
 
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
 <link rel="stylesheet" href="css/style.css"/>
    
 <link rel="shortcut icon" href="/favicon.ico">
 <link rel="apple-touch-icon" href="apple-touch-icon.png">
 
 <link rel="stylesheet" href="css/style.css">
 
</head>

<body>
 <?php include_once 'menu.php';?>
  
 <div class="main">
  <div class="container">
   <div class="row">
    <div class="col-xs-12">
        <?php if($work['image_path']):?>
		<img src="<?php echo $work['image_path'];?>" class="img-responsive">
		<?php else:?>
		<div class="embed-responsive embed-responsive-16by9">
			<video src="<?php echo $work['video_path'];?>" controls></video>
		</div>
		<?php endif;?>
		<div class="caption">
			<?php echo $work['introduce'];?>
		</div>
	</div>
   </div>
  </div>
 </div>
 
 <?php include_once('footer.php');?>
 
</body>
</html>