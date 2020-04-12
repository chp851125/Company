<?php
require_once 'mysqli_connect.php';
require_once 'function.php';

$datas = get_publish_article();

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-COMpatible" content="IE=edge,chrome=1">
<title>所有文章</title>
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
				<div class="col-xs-12">
    
    			<?php if(!empty($datas)):?>
   			    <?php foreach($datas as $article):?>
    
    			<?php
                 $abstract = strip_tags($article['content']);
                 $abstract = mb_substr($abstract, 0, 100, "UTF-8");
                ?>
    
  				   <div class="panel panel-primary">
						<div class="panel-heading">
							<a href='article.php ?i=<?php echo $article['id'];?>'><?php echo $article['title']?></a>
						</div>
						<div class="panel-body">
							<p>
								<span class="label label-info"><?php echo $article['category'];?></span>
								<span class="label label-danger"><?php echo $article['create_date'];?></span>
							</p>
 	  					    <?php echo $abstract." ...MORE";?>
	  					</div>
				   </div>
    			   <?php endforeach;?>
   				   <?php endif;?>
  				 </div>
			</div>
		</div>
	</div>
 
 <?php include_once('footer.php');?>
 
</body>
</html>